<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
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
    Route::get('page/{static_page}.html', [
        'as' => 'show_page',
        'uses' => 'PagesController@show'
    ]);

/*	Route::get('events', [
		'as' => 'events',
		'uses' => 'EventController@index'
	]);*/
    Route::get('events/{category?}', [
        'as' => 'view_events',
        'uses' => 'CategoryEventsController@index'
    ]);
    Route::get('event/{event}', [
        'as' => 'view_event',
        'uses' => 'EventController@show'
    ]);

    Route::get('trainings/{category?}', [
        'as' => 'view_trainings',
        'uses' => 'CategoryTrainingsController@index'
    ]);
    Route::get('training/{training}', [
        'as' => 'view_training',
        'uses' => 'TrainingController@show'
    ]);
    Route::get('teams/{trener?}', [
        'as' => 'view_team',
        'uses' => 'TeamController@index'
    ]);
    Route::get('partners/{partner?}', [
        'as' => 'view_partner',
        'uses' => 'PartnerController@index'
    ]);
});
/*Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('login', 'Keyhunter\Administrator\AuthController@getLogin');
    Route::post('login', 'Keyhunter\Administrator\AuthController@postLogin');
    Route::get('logout', 'Keyhunter\Administrator\AuthController@logout');
});*/
/*Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');*/