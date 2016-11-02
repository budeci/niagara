<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::multilingual(function () {
	Route::get('/', [
		'as' => 'home',
		'uses' => 'HomeController@index'
	]);

	Route::get('training', [
		'as' => 'training',
		'uses' => 'TrainingController@index'
	]);
    Route::get('page/{static_page}.html', [
        'as' => 'show_page',
        'uses' => 'PagesController@show'
    ]);
    Route::get('training/{post}', [
        'as' => 'view_training',
        'uses' => 'TrainingController@show'
    ]);

	Route::get('events', [
		'as' => 'events',
		'uses' => 'EventController@index'
	]);
});
/*Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('login', 'Keyhunter\Administrator\AuthController@getLogin');
    Route::post('login', 'Keyhunter\Administrator\AuthController@postLogin');
    Route::get('logout', 'Keyhunter\Administrator\AuthController@logout');
});*/
/*Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');*/