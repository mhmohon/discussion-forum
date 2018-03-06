<?php 
Route::group(['middleware'=>'auth'],function(){


	Route::get('forum/dashboard/view/report/department-wise-idea', ['middleware'=>'check-role:admin|qam','uses'=>'ReportController@ideaDepartment'])->name('reportIdeaDepartment');


});