<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //视图间共享数据
        view()->share('sitename', '元佑旅游圈');

//        //视图Composer
//        view()->composer('*',function($view){
//            $view->with('user',Auth::user());
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }
}
