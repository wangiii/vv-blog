<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\CategoryServices;
use App\Services\TagServices;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $categoryServices;
    protected $tagServices;

    public function __construct(CategoryServices $categoryServices, TagServices $tagServices)
    {
        $this->categoryServices = $categoryServices;
        $this->tagServices = $tagServices;
    }

    public function index(Request $request)
    {
        $articles = Article::query()
            ->where('category_id', '!=', 3) // 过滤算法题
            ->with('tags', 'category')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $tags = $this->tagServices->get();
        $categories = $this->categoryServices->get();

        return view('pages/root', compact(['articles', 'tags', 'categories']));
    }
}
