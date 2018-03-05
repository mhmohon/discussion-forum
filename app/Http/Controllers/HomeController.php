<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Idea;
use App\Comment;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $currentDate = Carbon::now()->toDateString();
        
        $latestTopics = Topic::where('start_date', '<=', $currentDate)
                                ->where('status', 1)
                                ->latest()->paginate(5);
        
        return view('frontend.pages.home', compact('latestTopics'));
    }

    public function topicShow($id)
    {   
        $topic = Topic::find($id); // finding the post
        
        $ideas = Idea::where('topic_id', $id)
                        ->where('status', 1)
                        ->latest()->paginate(5);

        if($topic){
            
            $topic->increment('view');
        }
        return view('frontend.pages.view_topic', compact('topic','ideas'));
    }

    public function ideaShow($id)
    {   
        $idea = Idea::find($id); // finding the post
        
        $comments = Comment::where('idea_id', $id)->latest()->paginate(10);

        if($idea){
            
            $idea->increment('view');
        }
        return view('frontend.pages.idea.view_idea', compact('idea','comments'));
    }

    public function myDashboard()
    {   
        $user = \Auth::user()->id; // finding the user
        
        
        return view('frontend.pages.profile.my_dashboard');
    }
}
