<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Controller;
use App\Model\User\Blog;

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
        \Schema::defaultStringLength(191);

        view()->composer('user.index', function ($view) {
                $view->with('archives', \App\Model\User\Homily::archives());
        });

        view()->composer('user.partials.navbar', function ($view) {
                $view->with('blogs', 'BlogController@blog');
        });

        //view()->composer('includes.sidebar', function ($view) {
        //        $view->with('archives', \App\Post::archives());
        //});
    }  

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
