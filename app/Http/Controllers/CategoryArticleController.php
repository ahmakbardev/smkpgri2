<?php

namespace App\Http\Controllers;

use App\Models\CategoryArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryArticle::all();
        return view('admins.articles.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = CategoryArticle::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'description' => $validatedData['description'],
        ]);

        return response()->json(['status' => 'success', 'category' => $category]);
    }

    public function edit(CategoryArticle $categoryArticle)
    {
        return response()->json($categoryArticle);
    }

    public function update(Request $request, CategoryArticle $categoryArticle)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categoryArticle->update([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'description' => $validatedData['description'],
        ]);

        return response()->json(['status' => 'success', 'category' => $categoryArticle]);
    }

    public function destroy(CategoryArticle $categoryArticle)
    {
        $categoryArticle->delete();
        return response()->json(['status' => 'success']);
    }
}
