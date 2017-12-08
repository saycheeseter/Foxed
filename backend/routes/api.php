<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function() {
    return response()->json([
        'user' => [
            'first_name' => 'chester',
            'last_name' =>'cheese'
        ]
    ]);
});

 Route::middleware('auth:api')->group(function () {
   // Route::resource('forums','ForumsController'); 
   Route::post('/community/create', 'ChannelController@store');
   Route::patch('/replies/{reply}', 'RepliesController@update');
    Route::resource('replies','RepliesController');
    Route::get('/classroom', 'ClassroomController@index');
    Route::get('/enrolledClass', 'UserGroupController@index');
    Route::post('/community/{channel}/{thread}/replies', 'RepliesController@store');
    Route::delete('/replies/{reply}', 'RepliesController@destroy');
   // Route::post('/community', 'ThreadController@store');
    Route::post('/community/{channel}', 'ThreadController@storeThreadOnChannel');
   
    Route::get('/currentChannel/{channel}', 'ThreadController@getThisChannel');
    Route::patch('/community/{channel}/{thread}', 'ThreadController@update');
    Route::delete('/community/{channel}/{thread}', 'ThreadController@destroy');
    Route::resource('codes','CodeController');
   
});

// Route::middleware('auth:api')->get('/user', function () {
//     Route::resource('forum','ForumsController'); 
//     // restricted api sht Protected
// });

//Route::get('/community', 'ThreadController@index');
//Route::get('/community/{thread}', 'ThreadController@show');
Route::post('/register', 'Auth\RegisterController@create');

Route::get('/classroom/{classroom}', 'ClassroomController@show');
Route::get('/community', 'ThreadController@index');
Route::get('/{user}/threads', 'ProfilesController@showOwnThreads');
Route::get('/community?by={name}', 'ThreadController@index');
Route::get('/channels', 'ThreadController@showChannels');
Route::get('/community/{channel}/{thread}', 'ThreadController@show');
Route::get('/community/create', 'ThreadController@create');
Route::get('/community/{channel}', 'ThreadController@index');
Route::get('/{user}/codes/', 'CodeController@showCodes');
Route::get('/{user}/works/', 'ProfilesController@show');


//Route::resource('threads', 'ThreadsController');
