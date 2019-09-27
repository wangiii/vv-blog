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
        $article = Article::where('id', $request->id)
            ->with('tags', 'category')
            ->firstOrFail();

        $content = $article->getContent();
        $tags = Tag::all();
        $categories = Category::all();

        return view('articles.show', compact(['article', 'tags', 'categories', 'content']));
    }
}
