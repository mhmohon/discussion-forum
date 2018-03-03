<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__ . '/web/dashboard.php';

require __DIR__ . '/web/backend_student.php';

require __DIR__ . '/web/backend_topic.php';

require __DIR__ . '/web/idea.php';


Auth::routes();


Route::get('/forum', 'HomeController@index')->name('home');

Route::get('/forum/topic/view&topic_id={id}', 'HomeController@show')->name('topicShow');

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/test', function () {
    return view ('backend.pages.test');
});


