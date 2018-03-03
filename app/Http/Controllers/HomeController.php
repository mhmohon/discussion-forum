<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
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

    public function show($id)
    {   
        $topic = Topic::find($id); // finding the post
        if($topic){
            
            $topic->increment('view');
        }

            
        return view('frontend.pages.view_topic', compact('topic'));
    }
}
