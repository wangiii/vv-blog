<?php


namespace App\Transformers;


use App\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTitleAndTimeTransformer extends TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'created_at' => $article->created_at->diffForHumans(),
            'updated_at' => $article->updated_at->diffForHumans(),
        ];
    }
}