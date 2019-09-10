<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show(Request $request)
    {
        $category = Category::query()->where('id', '=', $request->id)->firstOrFail();

        return view('categories.show', compact('category'));
    }
}
