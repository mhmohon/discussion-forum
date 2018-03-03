<?php 
Route::group(['middleware'=>'auth'],function(){

	Route::get('forum/topic/add/idea&topic_id={id}', ['middleware'=>'check-role:student|admin','uses'=>'IdeaController@index'])->name('addIdea');

	Route::post('forum/topic/add/idea&topic_id={id}', ['middleware'=>'check-role:staff|student|admin','uses'=>'IdeaController@store'])->name('storeIdea');


});