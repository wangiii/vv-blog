<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getHtmlContentAttribute()
    {
        $parser = new Parsedown();
        $convert2Html = $parser->text($this->content);
        return $convert2Html;
    }
}
