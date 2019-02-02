<?php

namespace App\Models\Article;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    use Notifiable;

    public function articles()
    {
        return $this->belongTo(\App\Models\Article\Article::class,'art_article_id');
    }
}
