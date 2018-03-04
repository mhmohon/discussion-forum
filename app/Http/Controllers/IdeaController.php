<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Idea;
use App\User;
class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $topic =  Topic::find($id);
        return view('frontend.pages.idea.create_idea', compact('topic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validate = $this->validate(request(),[
            'idea_title' => 'required|min:3',
            'idea_detail' => 'required|min:3',
            'agree' => 'required',
            'postas' => 'required',
            
        ]);

        if($validate){

        $user_id = \Auth::user()->id;
        if(request('postas') == 'realuser'){

            $name = \Auth::user()->student->first_name. ' '.\Auth::user()->student->last_name;
            Idea::create([
                'title' => request('idea_title'),
                'description' => request('idea_detail'),
                'name' => $name,
                'status' => '0',
                'user_id' => $user_id,
                'topic_id' => $id,

            ]);

        }elseif(request('postas') == 'anynomous'){
            Idea::create([
                'title' => request('idea_title'),
                'description' => request('idea_detail'),
                'name' => 'anynomous',
                'status' => '0',
                'user_id' => $user_id,
                'topic_id' => $id,

            ]);
        }
        return redirect()->route('topicShow', $id)->withMsgsucess('Your Idea has been posted.');

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($topic_id, $idea_id)
    {
        $idea = Idea::find($idea_id);
        $topic = Topic::find($topic_id);
        
        return view('frontend.pages.idea.edit_idea', compact('topic','idea'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $topic_id, $idea_id)
    {
        $validate = $this->validate(request(),[
            'idea_title' => 'required|min:3',
            'idea_detail' => 'required|min:3',
            'agree' => 'required',
            'postas' => 'required',
            
        ]);

        if($validate){

        $user_id = \Auth::user()->id;
        if(request('postas') == 'realuser'){

            $name = \Auth::user()->student->first_name. ' '.\Auth::user()->student->last_name;
            Idea::find($idea_id)->update([
                'title' => request('idea_title'),
                'description' => request('idea_detail'),
                'name' => $name,
            ]);

        }elseif(request('postas') == 'anynomous'){
            Idea::find($idea_id)->update([
                'title' => request('idea_title'),
                'description' => request('idea_detail'),
                'name' => 'anynomous',

            ]);
        }
        return redirect()->route('topicShow', $topic_id)->withMsgsucess('Your Idea has been Updated.');

        }else{
            return redirect()->back()->withInput();
        }
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
