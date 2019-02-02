<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repositories\Article\ArticleRepositoryInterface;

class ArticleFrontendController extends Controller
{

    protected $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function show($id)
    {
        $view_data = $this->articleRepository->show($id);

        \Event::fire('article.view', $view_data['article']);

        return view('frontend.article.article_detail',$view_data);
    }
}
