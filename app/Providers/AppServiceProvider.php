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
        ///*When the user requests an instance of stripe..*/
        \App::bind('\App\Billing\Stripe', function() {
            //We return an instance of Stripe and we pass in the API key
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });

        //If the user would like to resolve something out of the Stripe service container
        $stripe = resolve('\App\Billing\Stripe');

//        dd($stripe);
    }
}
