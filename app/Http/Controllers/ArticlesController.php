<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show(Request $request)
    {
        $article = Article::with('tags', 'category')
            ->findOrFail($request->id);

        $tags = Tag::all();

        $categories = Category::with('articles')->get();

        return view('articles.show', compact(['article', 'tags', 'categories']));
    }
}
