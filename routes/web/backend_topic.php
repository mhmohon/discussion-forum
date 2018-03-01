<?php 
Route::group(['middleware'=>'auth'],function(){

	Route::get('forum/dashboard/add/topic', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@create'])->name('addTopic');

	Route::post('forum/dashboard/add/topic', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@store'])->name('storeTopic');

	Route::get('forum/dashboard/view/topic', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@index'])->name('viewTopic');

});