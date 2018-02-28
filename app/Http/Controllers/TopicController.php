<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Carbon\Carbon;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = 'Add new Topic';
        return view ('backend.pages.topic.create_topic', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate(request(),[
            'topic_title' => 'required|min:3',
            'topic_des' => 'required|min:3',
            'closure_date' => 'required',
            'final_date' => 'required',
            'status' => 'required',
        ]);

        $closure_date = Carbon::parse(request('closure_date'))->format('Y-m-d');

       
        $final_date = Carbon::parse(request('final_date'))->format('Y-m-d');

        if($validate)
        {
            Topic::create([
                'title' => request('topic_title'),
                'description' => request('topic_des'),
                'start_date' => Carbon::now(),
                'closure_date' => $closure_date,
                'final_date' => $final_date,
                'status' => request('status')
            ]);

            return redirect()->back()->withMsgsuccess('Topic created successfully');
        }else{
            return redirect()->back()->withInput();
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}
