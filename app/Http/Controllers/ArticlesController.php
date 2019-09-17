<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function show(Request $request)
    {
        $article = $this->articleRepository->findById($request->id);
        $content = $article->getContent();
        $tags = Tag::all();
        $categories = Category::all();

        return view('articles.show', compact(['article', 'tags', 'categories', 'content']));
    }
}
