<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryServices;
use App\Services\TagServices;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryServices;
    protected $tagServices;

    public function __construct(CategoryServices $categoryServices, TagServices $tagServices)
    {
        $this->categoryServices = $categoryServices;
        $this->tagServices = $tagServices;
    }

    public function show(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $articles = $category->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $tags = $this->tagServices->get();
        $categories = $this->categoryServices->get();

        return view('categories.show', compact(['category', 'articles', 'tags', 'categories']));
    }
}
