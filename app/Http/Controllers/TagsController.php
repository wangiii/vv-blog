<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function show(Request $request)
    {
        $tag = Tag::query()
        ->where('id', '=', $request->id)
        ->firstOrFail();

        return view('tags.show', compact('tag'));
    }
}
