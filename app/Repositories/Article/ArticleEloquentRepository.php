<?php
namespace App\Repositories\Article;

use App\Repositories\EloquentRepository;
use App\Repositories\Article\ArticleRepositoryInterface;

class ArticleEloquentRepository extends EloquentRepository implements ArticleRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Article\Article::class;
    }

    
    public function show($id)
    {
        $article =  $this->_model->where('id',$id)
                                ->with('author:id,name','article_detail','category:id,cat_name','tags:id,tag_name')
                                ->select('id','art_name','art_meta_title','art_meta_keyword','art_meta_description','art_published_at','art_hit_view','art_cat_id','art_author_id')
                                ->first();
        $most_view_articles = $this->_model->whereNotIn('id',[$id])
                                            ->where('art_cat_id',$article->art_cat_id)
                                            ->orderBy('art_hit_view','desc')
                                            ->select('id','art_name','art_meta_title','art_avatar','art_published_at','art_hit_view')
                                            ->limit(10)
                                            ->get();

        $data = 
        [
            "article"            => $article,
            "most_view_articles" => $most_view_articles,
        ];

        return $data;
    }

    public function getListWithCategoryId($cate_id)
    {
        $articles = $this->_model->where('art_cat_id',$cate_id)
                                ->where('art_status',2)
                                ->select('id','art_name','art_meta_title','art_meta_description','art_hit_view','art_avatar','art_published_at','art_author_id')
                                ->with('author:id,name')
                                ->paginate(10);
        return $articles;
    }

    public function getListMostView()
    {
        $most_view_articles = $this->_model->select('id','art_name','art_hit_view','art_avatar','art_published_at')
                                        ->orderBy('art_hit_view','desc')
                                        ->limit(10)
                                        ->get();
        return $most_view_articles;
    }
}