<?php

namespace App\Services;

use App\Models\Category;

class CategoryServices
{
    public function get()
    {
        return Category::with('articles')->get();
    }
}
