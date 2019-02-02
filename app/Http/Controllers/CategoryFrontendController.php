<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Article\Article;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Article\ArticleRepositoryInterface;

class CategoryFrontendController extends Controller
{
    protected $categoryRepository;
    protected $articleRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository,ArticleRepositoryInterface $articleRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->articleRepository = $articleRepository;
    }

    public function showCategoryDetail($id)
    {
        $category = $this->categoryRepository->find($id);

        $articles = $this->articleRepository->getListWithCategoryId($id);

        $most_view_articles = $this->articleRepository->getListMostView();

        $view_data = [
            "articles" => $articles,
            "category" => $category,
            "most_view_articles" => $most_view_articles,
        ];
        return view('frontend.category.category_detail',$view_data);
    }
}
