<?php 

Route::get('dashboard/add/student', 'StudentBackendController@create')->name('addStudent');

Route::post('dashboard/add/student', 'StudentBackendController@store')->name('studnetStore');
