<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::query()
            ->with('tags', 'category')
            ->orderBy('created_at', 'desc')
            ->paginate();
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages/root', compact(['articles', 'tags', 'categories']));
    }
}
