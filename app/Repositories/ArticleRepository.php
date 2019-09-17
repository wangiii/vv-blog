<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function findById($id)
    {
        return Article::query()
            ->with('tags', 'category')
            ->where('id', '=', $id)
            ->firstOrFail();
    }

    public function paginate($perPage)
    {
        return Article::query()
            ->with('tags', 'category')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}
