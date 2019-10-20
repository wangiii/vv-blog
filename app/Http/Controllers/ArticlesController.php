<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ArticlesController extends Controller
{
    private $fractal;
    private $articleTransformer;

    public function __construct(Manager $fractal, ArticleTransformer $articleTransformer)
    {
        $this->fractal = $fractal;
        $this->articleTransformer = $articleTransformer;
    }

    public function index(Request $request)
    {
        $articlesPaginator = Article::query()
            ->where('category_id', '!=', 3) // 过滤算法题
            ->with('tags', 'category')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $articles = new Collection($articlesPaginator->items(), $this->articleTransformer);
        $articles->setPaginator(new IlluminatePaginatorAdapter($articlesPaginator));
        $articles = $this->fractal->createData($articles);

        return $articles->toArray();
    }

    public function show(Request $request)
    {
        $article = Article::with('tags', 'category')
            ->findOrFail($request->id);

        $article = new Item($article, $this->articleTransformer);
        $article = $this->fractal->createData($article);

        return $article->toArray();
    }
}
