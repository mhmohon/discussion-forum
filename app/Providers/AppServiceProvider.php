<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use Carbon\Carbon;
use App\Topic;
use App\User;
use App\Idea;
use App\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //To change the topic status with current date.
        $topics = Topic::latest()->get();
        
        foreach ($topics as $topic) {

           if($topic->start_date == \Carbon\Carbon::now()->toDateString()){

                Topic::find($topic->id)->update([
                    'status' => '1'
                ]);
           }
           if($topic->end_date < \Carbon\Carbon::now()->toDateString()){
                Topic::find($topic->id)->update([
                    'status' => '3'
                ]);
           }
        }
        
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

        View::composer('frontend.pages.profile.my_dashboard', function($view){

            $user = \Auth::user()->id;
            $myIdea = Idea::where('user_id', $user)
                                ->latest()
                                ->limit(5)
                                ->get();
            $myComment = Comment::where('user_id', $user)
                                ->latest()
                                ->limit(5)
                                ->get();

            $view->with('myIdea',$myIdea)->with('myComment',$myComment);
        });

        //for admin dashboard
        View::composer('backend.pages.home', function($view){

            $user = User::latest()->get();
            
            

            $view->with('user',$user);
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
