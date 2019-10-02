<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Request $request)
    {
        $tag = Tag::findOrFail($request->id);

        $articles = $tag->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $tags = Tag::all();

        $categories = Category::with('articles')->get();

        return view('tags.show', compact(['tag', 'articles', 'tags', 'categories']));
    }
}
