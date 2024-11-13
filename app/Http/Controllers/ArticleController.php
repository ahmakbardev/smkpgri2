<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'tags')->get();
        return view('admins.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = CategoryArticle::all();
        $tags = Tag::all(); // Untuk select tag
        return view('admins.articles.create', compact('categories', 'tags'));
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
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            'alt' => 'nullable|string', // teks alternatif gambar
        ]);

        // Handle upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/articles', $filename);
            $imagePath = str_replace('public/', 'storage/', $path); // Convert ke path yang bisa diakses
        }

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
        ]);

        // Attach existing tags
        // Attach existing tags only if IDs are valid
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

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
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
        $categories = CategoryArticle::all();
        $tags = Tag::all();
        return view('admins.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:category_articles,id',
            'existing_tags' => 'nullable|string',
            'new_tags' => 'nullable|string',
            'removed_tags' => 'nullable|string',
            'html_lang' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('images')) {
            if ($article->images) {
                Storage::delete(str_replace('storage/', 'public/', $article->images)); // Delete old image
            }
            $imagePath = $request->file('images')->store('public/articles');
            $imagePath = str_replace('public/', 'storage/', $imagePath);
        } else {
            $imagePath = $article->images;
        }

        // Update article
        $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'html_lang' => $validated['html_lang'],
            'description' => $validated['description'],
            'images' => $imagePath,
            'alt' => $validated['alt'],
        ]);

        // Handle tags
        // Detach removed tags
        if (!empty($validated['removed_tags'])) {
            $removedTagIds = array_filter(explode(',', $validated['removed_tags']));
            if (!empty($removedTagIds)) {
                $article->tags()->detach($removedTagIds);
            }
        }

        // Attach existing tags
        if (!empty($validated['existing_tags'])) {
            $existingTagIds = array_filter(explode(',', $validated['existing_tags']));
            if (!empty($existingTagIds)) {
                $article->tags()->syncWithoutDetaching($existingTagIds);
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

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
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
        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Article deleted successfully!',
        ]);
    }
}
