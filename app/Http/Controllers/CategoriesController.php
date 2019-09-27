<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Request $request)
    {
        $category = Category::where('id', $request->id)->firstOrFail();
        $articles = $category->articles()->paginate(20);
        $categories = Category::all();
        $tags = Tag::all();

        return view('categories.show', compact(['category', 'articles', 'tags', 'categories']));
    }
}
