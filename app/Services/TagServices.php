<?php

namespace App\Services;

use App\Models\Tag;

class TagServices
{
    public function get()
    {
        return Tag::all();
    }
}
