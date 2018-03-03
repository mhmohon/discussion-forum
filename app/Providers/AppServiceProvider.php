<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Carbon\Carbon;
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

            $currentDate = Carbon::now()->toDateString();

            $commingTopics = Topic::where('start_date', '>', $currentDate)->latest()->limit(10)->get();

            $view->with('commingTopics',$commingTopics);
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
