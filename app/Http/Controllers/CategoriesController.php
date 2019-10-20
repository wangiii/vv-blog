<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Transformers\ArticleTransformer;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;

class CategoriesController extends Controller
{
    private $fractal;
    private $articleTransformer;
    private $categoryTransformer;

    public function __construct(Manager $fractal, ArticleTransformer $articleTransformer, CategoryTransformer $categoryTransformer)
    {
        $this->fractal = $fractal;
        $this->articleTransformer = $articleTransformer;
        $this->categoryTransformer = $categoryTransformer;
    }

    public function index()
    {
        $categories = Category::withCount('articles')->get();

        $categories = new Collection($categories, $this->categoryTransformer);
        $categories = $this->fractal->createData($categories);

        return $categories->toArray();
    }

    public function show(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $articlesPaginator = $category->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $articles = new Collection($articlesPaginator->items(), $this->articleTransformer);
        $articles->setPaginator(new IlluminatePaginatorAdapter($articlesPaginator));
        $articles = $this->fractal->createData($articles);

        $articlesCount = $category->articles()->count();

        return [
            'name' => $category->name,
            'count' => $articlesCount,
            'articles' => $articles->toArray()
        ];
    }
}
