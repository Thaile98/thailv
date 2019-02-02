<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->singleton(\App\Repositories\Article\ArticleRepositoryInterface::class, function() {
                    $articleRepository = new \App\Repositories\Article\ArticleEloquentRepository;
                    return new \App\Repositories\Article\CacheArticleRepository($articleRepository);
                });
        $this->app->singleton(\App\Repositories\Category\CategoryRepositoryInterface::class, function() {
                    $categoryRepository = new \App\Repositories\Category\CategoryEloquentRepository;
                    return new \App\Repositories\Category\CacheCategoryRepository($categoryRepository);
                });
    }
}