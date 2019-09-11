<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Request $request)
    {
        $tag = Tag::query()
        ->where('id', '=', $request->id)
        ->firstOrFail();

        $tags = Tag::all();
        $categories = Category::all();

        return view('tags.show', compact(['tag', 'tags', 'categories']));
    }
}
