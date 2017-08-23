<?php

namespace App\Providers;

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
        /*This method allows you to perform any logic with the assumption that the framework is fully loaded
         * We hook into when any view is loaded - in this case the sidebar
         * Let's listen for when layouts.sidebar is loaded
         * Then I want to register a callback function where I can bind anything to that view
         **/
        view()->composer('layouts.sidebar', function($view){
            /*We add a variable called archives and that is equal to the archives*/
            $view->with('archives', \App\Post::archives());
        });

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
