<?php 
Route::group(['middleware'=>'auth'],function(){


	Route::get('forum/dashboard/view/report/department-wise-idea', ['middleware'=>'check-role:admin|qam','uses'=>'ReportController@ideaDepartment'])->name('reportIdeaDepartment');

	Route::get('forum/dashboard/view/report/anynomous-idea', ['middleware'=>'check-role:admin|qam','uses'=>'ReportController@anynomousIdea'])->name('anynomousIdea');

	Route::get('forum/dashboard/view/report/anynomous-comment', ['middleware'=>'check-role:admin|qam','uses'=>'ReportController@anynomousComment'])->name('anynomousComment');


});