<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();

        $category = Category::where('id', $request->id)->with(['articles' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->firstOrFail();

        return view('categories.show', compact(['category', 'tags', 'categories']));
    }
}
