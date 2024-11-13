<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    // Function to check if a tag exists, or create it
    public function check(Request $request)
    {
        $tagName = $request->input('tag');

        // Check if the tag exists in the database
        $tag = Tag::where('name', $tagName)->first();

        // If tag does not exist, create it
        if (!$tag) {
            $tag = Tag::create([
                'name' => $tagName,
                'slug' => Str::slug($tagName),
            ]);
        }

        return response()->json(['tag' => $tag]);
    }

    // Function to search for tags based on query
    public function search(Request $request)
    {
        $query = $request->input('query');
        $tags = Tag::where('name', 'like', "%{$query}%")->get();

        return response()->json(['tags' => $tags]);
    }
}
