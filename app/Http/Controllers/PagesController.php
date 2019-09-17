<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(Request $request)
    {
        $articles = $this->articleRepository->paginate(8);
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages/root', compact(['articles', 'tags', 'categories']));
    }
}
