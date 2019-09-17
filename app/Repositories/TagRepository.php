<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function one($id)
    {
        return Tag::where('id', $id)->with(['articles' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->firstOrFail();
    }
}
