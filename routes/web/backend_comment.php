<?php 
Route::group(['middleware'=>'auth'],function(){


	Route::get('forum/dashboard/view/comment', ['middleware'=>'check-role:admin|qam','uses'=>'BackendCommentController@index'])->name('viewComment');

	Route::get('forum/dashboard/comment/edit&comment_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackendCommentController@show'])->name('editComment');

	Route::post('forum/dashboard/comment/edit&comment_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackendCommentController@update'])->name('CommentUpdate');



});