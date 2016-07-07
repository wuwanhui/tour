<?php

namespace App\Providers;

use App\Http\Service\CommonService;
use App\Http\Service\CommonServiceImpl;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
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

        //使用bind绑定实例到接口以便依赖注入
        $this->app->bind('common', function () {
            return new CommonService();
        });
    }
}
