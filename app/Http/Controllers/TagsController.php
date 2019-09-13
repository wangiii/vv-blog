<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();

        $tag = Tag::where('id', $request->id)->with(['articles' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->firstOrFail();

        return view('tags.show', compact(['tag', 'tags', 'categories']));
    }
}
