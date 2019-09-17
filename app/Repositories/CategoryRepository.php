<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function findById($id)
    {
        return Category::where('id', $id)->with(['articles' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->firstOrFail();
    }
}
