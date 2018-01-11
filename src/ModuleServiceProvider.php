<?php

namespace XmtApp\Module\Administration;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider {

    // 语言包
    protected $trans = 'admin';

    // 视图
    protected $view = 'admin';

    // 路由前缀
    protected $route_prefix = 'admin';
    /**
     * The controller namespace for the application.
     *
     * @var string|null
     */
    protected $namespace = "XmtApp\Module\Administration\Controllers";

    /**
     * 在注册后进行服务的启动。
     *
     * @return void
     */
    public function boot()
    {
        // 设置模块的路由文件
        $this->mapWebRoutes($this->route_prefix);

        // 设置数据迁移模块
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // 设置模块语言包目录
        $this->loadTranslationsFrom(__DIR__.'/../resources/translations', $this->trans);

        // 设置模块的视图目录
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->view);

        $this->setPublishes();

        $this->mergeConfigFrom(__DIR__.'/../config/admin.php', 'admin');
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes(string $prefix)
    {
        Route::prefix($prefix)->middleware('web')
             ->namespace($this->namespace)
             ->group(__DIR__.'/routes.php');
    }

    protected function setPublishes()
    {
        $this->publishes([
            __DIR__.'/../config/admin.php' => config_path('admin.php')
        ], 'admin-config');
    }
}