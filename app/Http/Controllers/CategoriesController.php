<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show(Request $request)
    {
        $category = $this->categoryRepository->findById($request->id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('categories.show', compact(['category', 'tags', 'categories']));
    }
}
