<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function show(Request $request)
    {
        $tag = $this->tagRepository->one($request->id);
        $tags = Tag::all();
        $categories = Category::all();

        return view('tags.show', compact(['tag', 'tags', 'categories']));
    }
}
