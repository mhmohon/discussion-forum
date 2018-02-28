<?php 

Route::get('forum/dashboard/add/topic', 'TopicController@create')->name('addTopic');

Route::post('forum/dashboard/add/topic', 'TopicController@store')->name('storeTopic');

Route::post('forum/dashboard/view/topic', 'TopicController@index')->name('viewTopic');