<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use DB;
use Charts;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        $chart = Charts::database($ideas, 'bar', 'highcharts')
                ->title('Monthly Idea post')
                ->elementLabel("Total Idea")
                ->responsive(false)
                ->groupByMonth(date('Y'), true);

        return view ('backend.pages.home', compact('chart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_read($idea_id, $notify_id)
    {
        
        auth()->user()->unreadNotifications->find($notify_id)->markAsRead(); 
        
        return redirect()->route('editIdea',$idea_id);
    }

    public function notifyReadAll()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
