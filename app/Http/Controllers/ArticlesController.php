<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\CategoryServices;
use App\Services\TagServices;
use Illuminate\Http\Request;

class ArticlesController extends Controller
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
        $article = Article::with('tags', 'category')
            ->findOrFail($request->id);

        $tags = $this->tagServices->get();
        $categories = $this->categoryServices->get();

        return view('articles.show', compact(['article', 'tags', 'categories']));
    }
}
