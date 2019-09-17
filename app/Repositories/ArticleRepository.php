<?php

namespace App\Repositories;

use App\Models\Article;
use Parsedown;

class ArticleRepository
{
    private $parser;

    public function __construct(Parsedown $parser)
    {
        $this->parser = $parser;
    }

    public function one($id)
    {
        return Article::query()
            ->with('tags', 'category')
            ->where('id', '=', $id)
            ->firstOrFail();
    }

    public function convertMarkdownToHtml($markdown)
    {
        $convertedHtml = $this->parser->text($markdown);
        return $convertedHtml;
    }

    public function paginate($perPage)
    {
        return Article::query()
            ->with('tags', 'category')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}
