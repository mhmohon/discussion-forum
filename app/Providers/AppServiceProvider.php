<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use Carbon\Carbon;
use App\Topic;
use App\Idea;

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
                                })->latest()->limit(6)->get();

            $activeIdeas = Idea::whereHas('comment', function($q){
                                    $q->where('user_id', \Auth::user()->id);
                                })->latest()->limit(6)->get();

            $view->with('commingTopics',$commingTopics)->with('activeTopics',$activeTopics)->with('activeIdeas',$activeIdeas);
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
