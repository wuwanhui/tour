<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * 在容器中注册绑定.
     *
     * @return void
     */
    public function boot()
    {
        // 使用基于类的composers...
        view()->composer(
            ['manage.*', 'supplier.*'], 'App\Http\ViewComposers\ProfileComposer'
        );

        // 使用基于闭包的composers...
        view()->composer('dashboard', function ($view) {
        });
    }

    /**
     * 注册服务提供者.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}