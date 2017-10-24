<?php

namespace XmtApp\Module\Administration;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider {
    
    // 模块标识
    protected $identification = 'administration';

    // 配置集合名
    protected $config = 'admin';

    // 语言包
    protected $trans = 'admin';

    // 视图
    protected $view = 'admin';

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
        $this->setRootControllerNamespace();
        
        // 设置模块的路由文件
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // 设置数据迁移模块
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // 设置模块语言包目录
        $this->loadTranslationsFrom(__DIR__.'/../resources/translations', $this->trans);

        // 设置模块的视图目录
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->view);
    }

    /**
     * Set the root controller namespace for the application.
     *
     * @return void
     */
    protected function setRootControllerNamespace()
    {
        if (! is_null($this->namespace)) {
            $this->app[UrlGenerator::class]->setRootControllerNamespace($this->namespace);
        }
    }
}