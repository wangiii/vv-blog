<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Parsedown;

class ArticlesController extends Controller
{
    protected $markdownParser;

    public function __construct()
    {
        $this->markdownParser = new Parsedown();
    }

    public function show(Request $request)
    {
        $article = Article::query()
            ->with('tags', 'category')
            ->where('id', '=', $request->id)
            ->firstOrFail();

        $tags = Tag::all();
        $categories = Category::all();

        $mdContent = $this->convertMarkdownToHtml($article->content);

        return view('articles.show', compact(['article', 'tags', 'categories', 'mdContent']));
    }

    public function convertMarkdownToHtml($markdown)
    {
        $convertedHtml = $this->markdownParser->text($markdown);
        return $convertedHtml;
    }
}
