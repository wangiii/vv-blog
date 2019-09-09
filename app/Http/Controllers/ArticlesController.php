<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::query()
            ->with('tags')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('articles.index', compact('articles'));
    }

    public function show(Request $request)
    {
        $article = Article::query()
            ->with('tags')
            ->where('id', '=', $request->id)
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }
}
