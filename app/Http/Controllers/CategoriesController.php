<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Request $request)
    {
        $category = Category::query()->where('id', '=', $request->id)->firstOrFail();
        $tags = Tag::all();
        $categories = Category::all();

        return view('categories.show', compact(['category', 'tags', 'categories']));
    }
}
