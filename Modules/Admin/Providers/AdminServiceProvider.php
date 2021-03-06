<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        require dirname(dirname(__FILE__)).'\Helper\load_helper.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
                \Modules\Admin\Repositories\Article\AdminArticleRepositoryInterface::class,
                \Modules\Admin\Repositories\Article\AdminArticleEloquentRepository::class
            );
        $this->app->singleton(
                \Modules\Admin\Repositories\Admin\AdminRepositoryInterface::class,
                \Modules\Admin\Repositories\Admin\AdminEloquentRepository::class
            );
        $this->app->singleton(
                \Modules\Admin\Repositories\Role\RoleRepositoryInterface::class,
                \Modules\Admin\Repositories\Role\RoleEloquentRepository::class
            );
        $this->app->singleton(
                \Modules\Admin\Repositories\Permission\PermissionRepositoryInterface::class,
                \Modules\Admin\Repositories\Permission\PermissionEloquentRepository::class
            );
        $this->app->singleton(
                \Modules\Admin\Repositories\SidebarAdmin\SidebarAdminRepositoryInterface::class,
                \Modules\Admin\Repositories\SidebarAdmin\SidebarAdminEloquentRepository::class
            );
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('admin.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'admin'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/admin');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/admin';
        }, \Config::get('view.paths')), [$sourcePath]), 'admin');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/admin');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'admin');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'admin');
        }
    }

    /**
     * Register an additional directory of factories.
     * @source https://github.com/sebastiaanluca/laravel-resource-flow/blob/develop/src/Modules/ModuleServiceProvider.php#L66
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
