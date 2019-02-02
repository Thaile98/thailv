<?php
namespace App\Repositories\Article;

use App\Repositories\Article\ArticleRepositoryInterface;
use App\Models\Article\Article;
use App\Repositories\Article\ArticleEloquentRepository;
use Illuminate\Support\Collection;
use Cache;
class CacheArticleRepository implements ArticleRepositoryInterface
{
    /*
     * @var ArticleRepositoryInterface
     */
    private $articleRepository;
    
    public function __construct(ArticleEloquentRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function show($id)
    {
        return Cache::store('file')->remember("Articles.id.{$id}", 60, function() use ($id) {
            return $this->articleRepository->show($id);
        });
    }

    public function getListWithCategoryId($cate_id)
    {
        return Cache::store('file')->remember("Articles.list.{$cate_id}", 60, function() use ($cate_id) {
            return $this->articleRepository->getListWithCategoryId($cate_id);
        });
    }

    public function getListMostView()
    {
        return Cache::store('file')->remember("Articles.listMostView", 60, function(){
            return $this->articleRepository->getListMostView();
        });
    }
}