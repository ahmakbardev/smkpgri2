<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Guru;
use App\Models\SchoolProfile;
use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class IndexController extends Controller
{
    public function index()
    {
        // Ambil artikel terbaru, kategori, dan penulis
        $articles = Article::with('category', 'tags', 'author')
            ->latest()
            ->take(18) // Batasi 12 artikel untuk ditampilkan di awal
            ->get();

        $carouselArticles = Article::with('author') // Tambahkan query untuk carousel
            ->latest()
            ->take(3)
            ->get();

        $categories = CategoryArticle::all();

        // Ambil pengguna dengan role "Penulis"
        $authors = User::where('role', 'Penulis')->latest()->take(5)->get();

        $schoolProfile = SchoolProfile::first(); // Ambil profil sekolah pertama (hanya ada satu data)

        $visi = $schoolProfile->visi; // Ambil visi
        $misi = json_decode($schoolProfile->misi); // Decode misi JSON menjadi array

        return view('index', compact('articles', 'carouselArticles', 'categories', 'authors', 'visi', 'misi'));
    }

    public function filterByCategory($categoryId)
    {
        if ($categoryId === 'all') {
            $articles = Article::latest()->take(18)->get();
        } else {
            $articles = Article::where('category_id', $categoryId)->latest()->take(18)->get();
        }

        return response()->json([
            'articles' => view('partials.articles-list', compact('articles'))->render()
        ]);
    }



    public function show($slug)
    {
        // Ambil artikel berdasarkan slug dari title
        $article = Article::with('category', 'tags', 'author')
            ->where('title', str_replace('-', ' ', $slug))
            ->firstOrFail();

        // Ambil artikel terbaru lainnya
        $latestArticles = Article::latest()
            ->where('id', '!=', $article->id)
            ->take(3)
            ->get();

        return view('articles.detail', compact('article', 'latestArticles'));
    }

    public function listGuru()
    {
        $gurus = Guru::with('jabatan')->get(); // Mengambil data guru beserta jabatannya
        return view('guru.list', compact('gurus'));
    }
}
