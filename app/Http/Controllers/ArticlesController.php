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
        $article = $this->articleRepository->one($request->id);
        $content = $this->articleRepository->convertMarkdownToHtml($article->content);
        $tags = Tag::all();
        $categories = Category::all();

        return view('articles.show', compact(['article', 'tags', 'categories', 'content']));
    }
}
