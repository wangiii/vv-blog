<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Transformers\ArticleTitleAndTimeTransformer;
use App\Transformers\TagTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;

class TagsController extends Controller
{
    private $fractal;
    private $articleTitleAndTimeTransformer;
    private $tagTransformer;

    public function __construct(Manager $fractal, ArticleTitleAndTimeTransformer $articleTitleAndTimeTransformer,TagTransformer $tagTransformer)
    {
        $this->fractal = $fractal;
        $this->articleTitleAndTimeTransformer = $articleTitleAndTimeTransformer;
        $this->tagTransformer = $tagTransformer;
    }

    public function index()
    {
        $tags = Tag::withCount('articles')->get();

        $tags = new Collection($tags, $this->tagTransformer);
        $tags = $this->fractal->createData($tags);

        return $tags->toArray();
    }

    public function show(Request $request)
    {
        $tag = Tag::findOrFail($request->id);

        $articlesPaginator = $tag->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $articles = new Collection($articlesPaginator->items(), $this->articleTitleAndTimeTransformer);
        $articles->setPaginator(new IlluminatePaginatorAdapter($articlesPaginator));
        $articles = $this->fractal->createData($articles);

        $articlesCount = $tag->articles()->count();

        return [
            'name' => $tag->name,
            'count' => $articlesCount,
            'articles' => $articles->toArray()
        ];
    }
}
