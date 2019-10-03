<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\CategoryServices;
use App\Services\TagServices;
use Illuminate\Http\Request;

class TagsController extends Controller
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
        $tag = Tag::findOrFail($request->id);

        $articles = $tag->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $tags = $this->tagServices->get();
        $categories = $this->categoryServices->get();

        return view('tags.show', compact(['tag', 'articles', 'tags', 'categories']));
    }
}
