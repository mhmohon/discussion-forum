<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
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
        $topics = Topic::where('status', 1)->latest()->paginate(5);
        return view('frontend.pages.home', compact('topics'));
    }

    public function show($id)
    {   
        $topic = Topic::find($id); // finding the post

        
        $topic->increment('view');
            
        $topics = Topic::where('id', $id)->get();

        return back();
        //return view('frontend.pages.home', compact('topics'));
    }
}
