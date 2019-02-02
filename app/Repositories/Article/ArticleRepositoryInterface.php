<?php
namespace App\Repositories\Article;

interface ArticleRepositoryInterface
{
    public function show($id);

    public function getListWithCategoryId($cate_id);

    public function getListMostView();

}