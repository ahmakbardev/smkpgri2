<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        if ($user->role === 'Penulis') {
            // Tampilkan hanya artikel milik penulis yang sedang login
            $articles = Article::with('category', 'tags')
                ->where('user_id', $user->id)
                ->get();
        } else {
            // Tampilkan semua artikel jika bukan Penulis
            $articles = Article::with('category', 'tags')->get();
        }

        return view('penulis.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = CategoryArticle::all();
        $tags = Tag::all(); // Untuk select tag
        return view('penulis.articles.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:category_articles,id',
            'existing_tags' => 'nullable|string',
            'new_tags' => 'nullable|string',
            'html_lang' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt' => 'nullable|string',
        ]);

        // Handle upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/articles', $filename);
            $imagePath = str_replace('public/', 'storage/', $path); // Convert ke path yang bisa diakses
        }

        $user_id = auth()->id(); // Tambahkan user_id dari pengguna yang login
        // Create the article
        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'status' => 'draft', // Status default
            'html_lang' => $validated['html_lang'],
            'description' => $validated['description'],
            'images' => $imagePath,
            'alt' => $validated['alt'],
            'user_id' => $user_id, // Tambahkan user_id dari pengguna yang login
        ]);

        // Attach existing tags
        if (!empty($validated['existing_tags'])) {
            $existingTagIds = array_filter(explode(',', $validated['existing_tags']));
            if (!empty($existingTagIds)) {
                $article->tags()->attach($existingTagIds);
            }
        }

        // Add new tags
        if (!empty($validated['new_tags'])) {
            $newTagNames = explode(',', $validated['new_tags']);
            foreach ($newTagNames as $tagName) {
                $newTag = Tag::firstOrCreate(['name' => $tagName]);
                $article->tags()->attach($newTag->id);
            }
        }

        return redirect()->route('penulis.articles.index')->with('success', 'Article created successfully.');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $extension = $file->getClientOriginalExtension();
            $mime = $file->getMimeType();
            $allowedExtensions = ['png', 'jpeg', 'jpg'];
            $allowedMimes = ['image/png', 'image/jpeg'];

            // Cek apakah ekstensi dan mime type diperbolehkan
            if (in_array(strtolower($extension), $allowedExtensions) && in_array($mime, $allowedMimes)) {
                // Buat nama file yang unik dengan UUID
                $filename = Str::uuid() . '.' . $extension;

                // Simpan file di folder 'public/materi'
                $path = $file->storeAs('public/artikel', $filename);

                // Buat URL untuk gambar yang di-upload
                $url = Storage::url($path);

                // Response untuk CKEditor
                return response()->json([
                    'uploaded' => true,
                    'url' => asset($url)
                ]);
            } else {
                // Jika file tidak valid, kirim response error
                return response()->json(['uploaded' => false, 'error' => ['message' => 'Invalid file type or mime type']], 400);
            }
        }

        // Handle jika file tidak ada di dalam request
        return response()->json(['uploaded' => false, 'error' => ['message' => 'No file uploaded']], 400);
    }

    public function edit(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = CategoryArticle::all();
        $tags = Tag::all();
        return view('penulis.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        // Pastikan hanya pemilik artikel yang dapat mengedit
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:category_articles,id',
            'existing_tags' => 'nullable|string', // Tag yang sudah ada di database
            'new_tags' => 'nullable|string', // Tag baru yang akan dibuat
            'removed_tags' => 'nullable|string', // Tag yang akan dihapus
            'html_lang' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'alt' => 'nullable|string',
        ]);

        // Handle image upload
        $imagePath = $article->images; // Default gunakan gambar lama
        if ($request->hasFile('images')) {
            if ($article->images) {
                Storage::delete(str_replace('storage/', 'public/', $article->images)); // Hapus gambar lama
            }
            $uploadedImage = $request->file('images')->store('public/articles');
            $imagePath = str_replace('public/', 'storage/', $uploadedImage);
        }

        // Update artikel
        $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'html_lang' => $validated['html_lang'],
            'description' => $validated['description'],
            'images' => $imagePath,
            'alt' => $validated['alt'],
        ]);

        // Handle tags logic
        // Hapus tag yang dihapus
        if (!empty($validated['removed_tags'])) {
            $removedTagIds = array_filter(explode(',', $validated['removed_tags']));
            if (!empty($removedTagIds)) {
                $article->tags()->detach($removedTagIds);
            }
        }

        // Tambahkan tag yang sudah ada
        if (!empty($validated['existing_tags'])) {
            $existingTagIds = array_filter(explode(',', $validated['existing_tags']));
            if (!empty($existingTagIds)) {
                $article->tags()->syncWithoutDetaching($existingTagIds);
            }
        }

        // Tambahkan tag baru
        if (!empty($validated['new_tags'])) {
            $newTagNames = array_filter(explode(',', $validated['new_tags']));
            foreach ($newTagNames as $tagName) {
                $newTag = Tag::firstOrCreate(['name' => $tagName]);
                $article->tags()->attach($newTag->id);
            }
        }

        return redirect()->route('penulis.articles.index')->with('success', 'Article updated successfully.');
    }


    public function updateStatus(Request $request, $id)
    {
        // Validasi status agar sesuai dengan nilai enum yang ada di migration
        $validated = $request->validate([
            'status' => 'required|in:draft,published,archived',
        ]);

        // Cari artikel berdasarkan ID
        $article = Article::findOrFail($id);

        // Update kolom status pada artikel
        $article->update([
            'status' => $validated['status'],
        ]);

        // dd($article);

        // Kembalikan response JSON untuk success
        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!',
        ]);
    }


    public function destroy(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized action.',
            ], 403);
        }

        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Article deleted successfully!',
        ]);
    }
}
