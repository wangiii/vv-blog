<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Request $request)
    {
        $tag = Tag::where('id', $request->id)->firstOrFail();
        $articles = $tag->articles()->paginate(20);;
        $tags = Tag::all();
        $categories = Category::all();

        return view('tags.show', compact(['tag', 'articles', 'tags', 'categories']));
    }
}
