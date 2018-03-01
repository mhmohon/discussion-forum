<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Topic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.layouts.right_sidebar', function($view){

            $topics = Topic::where('status', 0)->get();

            $view->with('topics',$topics);
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
