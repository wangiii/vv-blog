<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $articles = $category->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Category::with('articles')->get();

        $tags = Tag::all();

        return view('categories.show', compact(['category', 'articles', 'tags', 'categories']));
    }
}
