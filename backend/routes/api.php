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
    Route::post('/community/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store');
    Route::delete('/community/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy');
    Route::resource('replies','RepliesController');
   
   
    Route::post('/community/create', 'ChannelController@store')->middleware('must-be-confirmed');
    Route::get('/classroom', 'ClassroomController@index');
    
    Route::post('/community/{channel}/{thread}/replies', 'RepliesController@store');
   // Route::post('/community', 'ThreadController@store');
    Route::get('/currentChannel/{channel}', 'ThreadController@getThisChannel');
    Route::patch('/community/{channel}/{thread}', 'ThreadController@update');
    Route::delete('/community/{channel}/{thread}', 'ThreadController@destroy');
    Route::resource('codes','CodeController');
    Route::patch('/codes/{code}','CodeController@update');
    Route::post('/community/{channel}', 'ThreadController@storeThreadOnChannel')->middleware('must-be-confirmed');
    Route::post('/classroom/{classroom}/join', 'UserGroupController@membership');
    Route::post('/classroom/create/a','ClassroomController@create');
    Route::get('/classroom/{classroom}', 'ClassroomController@show');
 
    Route::get('/enrolledClass', 'ClassroomController@index');
    Route::get('/showTimeline', 'ClassroomController@showTimeline');
    Route::resource('activity','ActivityController');
    Route::get('/activities/{id}/show/', 'ActivityController@showActivities');
    Route::get('/profiles/{user}/notifications/', 'UserNotificationsController@index');
    Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');
    Route::post('/{user}/avatar', 'UserAvatarController@store');
    Route::resource('/community/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController');

    Route::get('/activities/{Actid}', 'ClassroomController@showActs');
    Route::get('/activities/{Actid}/eval', 'ActivityController@evaluationCodes');
    Route::post('/submitScore','ScoreController@create');
    Route::post('/replies/{reply}/favorites','FavoritesController@store');
    
});
Route::get('/community/{channel}/{thread}/replies', 'RepliesController@index');

Route::get('/community/{channel}/{thread}', 'ThreadController@show');
// Route::middleware('auth:api')->get('/user', function () {
//     Route::resource('forum','ForumsController'); 
//     // restricted api sht Protected
// });

//Route::get('/community', 'ThreadController@index');
//Route::get('/community/{thread}', 'ThreadController@show');
Route::post('/register', 'Auth\RegisterController@create');
Route::post('/register/confirm', 'Api\RegisterConfirmationController@index');
Route::get('/threads/search', 'SearchController@show');
Route::get('/channel/search', 'SearchController@showChannel');
Route::get('/community', 'ThreadController@index');
Route::get('/{user}/threads', 'ProfilesController@showOwnThreads');
Route::get('/community?by={name}', 'ThreadController@index');
Route::get('/channels', 'ThreadController@showChannels');
Route::get('/community/create', 'ThreadController@create');
Route::get('/community/{channel}', 'ThreadController@index');
Route::get('/{user}/codes/', 'CodeController@showCodes');
Route::get('/{user}/works/', 'ProfilesController@show');
Route::get('/{user}/user', 'UserAvatarController@show');
    
//Route::resource('threads', 'ThreadsController');