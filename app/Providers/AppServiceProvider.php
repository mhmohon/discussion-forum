<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
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

            $activeTopics = Topic::whereHas('idea', function($q){
                                    $q->where('user_id', \Auth::user()->id);
                                })->get();

            $view->with('commingTopics',$commingTopics)->with('activeTopics',$activeTopics);
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
