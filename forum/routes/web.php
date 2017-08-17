<?php Route::get('/', function () {
return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('threads', 'ThreadsController@index');
Route::get('threads/create', 'ThreadsController@create');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::post('threads', 'ThreadsController@store');
Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');
Route::get('threads/{channel}','ThreadsController@index');