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
        // Artikel untuk bagian utama
        $articles = Article::with('category', 'tags', 'author')
            ->where('status', 'published') // Tambahkan kondisi untuk hanya artikel yang dipublish
            ->orderByDesc('is_favorite') // Prioritaskan artikel yang di-favoritkan
            ->latest()
            ->take(18)
            ->get();

        // Artikel untuk carousel
        $carouselArticles = Article::with('author')
            ->where('status', 'published') // Tambahkan kondisi untuk hanya artikel yang dipublish
            ->orderByDesc('is_favorite') // Prioritaskan artikel yang di-favoritkan
            ->latest()
            ->take(3)
            ->get();

        // Ambil semua kategori
        $categories = CategoryArticle::all();

        // Ambil pengguna dengan role "Penulis"
        $authors = User::where('role', 'Penulis')->latest()->take(5)->get();

        // Ambil profil sekolah
        $schoolProfile = SchoolProfile::first();
        $visi = $schoolProfile->visi;
        $misi = json_decode($schoolProfile->misi);

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
            ->where('status', 'published') // Tambahkan kondisi untuk hanya artikel yang dipublish
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
