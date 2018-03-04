<?php 
Route::group(['middleware'=>'auth'],function(){

	Route::post('forum/idea/add/commnet&idea_id={id}', ['middleware'=>'check-role:staff|student','uses'=>'CommentController@store'])->name('addComment');


	Route::get('forum/idea/edit/commnet&idea_id={id}&idea_id={ideaId}', ['middleware'=>'check-role:staff|student','uses'=>'IdeaController@edit'])->name('EditIdea');

	Route::post('forum/idea/edit/commnet&idea_id={id}&idea_id={ideaId}', ['middleware'=>'check-role:staff|student','uses'=>'IdeaController@update'])->name('updateIdea');


});