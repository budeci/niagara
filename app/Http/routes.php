<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

use App\Repositories\OffertRepository;
use App\Repositories\LifeStyleRepository;
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

Route::bind('offert',function($slug){
    return (new OffertRepository)->findBySlug($slug);
});
Route::bind('lifestyle',function($slug){
    return (new LifeStyleRepository)->findBySlug($slug);
});

/*Route::get('/', function () {
    return view('welcome');
});*/

use App\Repositories\EventRepository;
use App\Repositories\PostRepository;
use App\Repositories\OpportunityAntrenamentRepository;

Route::bind('event', function ($slug) {
    return (new EventRepository)->findBySlug($slug);
});

Route::bind('post', function ($slug) {
    return (new PostRepository)->findBySlug($slug);
});

Route::bind('service', function ($slug) {
    return (new OpportunityAntrenamentRepository)->findBySlug($slug);
});

Route::multilingual(function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
    Route::get('page/{static_page}.html', [
        'as' => 'show_page',
        'uses' => 'PagesController@show'
    ]);

/*  Route::get('events', [
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

    Route::get('trainings', [
        'as' => 'view_trainings',
        'uses' => 'TrainingController@index'
    ]);
    Route::get('training/{slug}', [
        'as' => 'view_training',
        'uses' => 'TrainingController@show'
    ]);

    Route::get('kids-trainings', [
        'as' => 'view_kids_trainings',
        'uses' => 'KidsController@index'
    ]);
    Route::get('kids-training/{slug}', [
        'as' => 'view_kids_training',
        'uses' => 'KidsController@show'
    ]);

    Route::get('teams/{slug?}', [
        'as' => 'view_team',
        'uses' => 'TeamController@index'
    ]);
    Route::get('partners/{slug?}', [
        'as' => 'view_partner',
        'uses' => 'PartnerController@index'
    ]);

    Route::get('news/{slug?}', [
        'as' => 'view_news',
        'uses' => 'CategoryNewsController@index'
    ]);
    Route::get('post/{post}', [
        'as' => 'view_post',
        'uses' => 'PostController@show'
    ]);
    Route::get('advertisement', [
        'as' => 'advertisement_page',
        'uses' => 'PagesController@advertisement'
    ]);
    Route::get('presa', [
        'as' => 'press_show',
        'uses' => 'PressController@show'
    ]);
    Route::get('vacancy', [
        'as' => 'vacancy_show',
        'uses' => 'VacancyController@show'
    ]);
    Route::get('oferts-page', [
        'as' => 'show_oferts',
        'uses' => 'OffertController@show'
    ]);
    Route::get('ofert-page/{offert}', [
        'as' => 'show_ofert',
        'uses' => 'OffertController@showSingle'
    ]);
    Route::get('life-style', [
        'as' => 'life_style',
        'uses' => 'LifeStyleController@show'
    ]);
    Route::get('life-style-article/{lifestyle}', [
        'as' => 'life_style_article',
        'uses' => 'LifeStyleController@showSingle'
    ]);
    Route::get('fitness-oferte', [
        'as' => 'view_fitness_adult',
        'uses' => 'FitnessOferteController@indexAdult'
    ]);
    Route::get('kids-club', [
        'as' => 'view_fitness_kids',
        'uses' => 'FitnessOferteController@indexKids'
    ]);
    Route::get('fitness/{service}', [
        'as' => 'view_fitness',
        'uses' => 'FitnessOferteController@show'
    ]);

});
/*Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('login', 'Keyhunter\Administrator\AuthController@getLogin');
    Route::post('login', 'Keyhunter\Administrator\AuthController@postLogin');
    Route::get('logout', 'Keyhunter\Administrator\AuthController@logout');
});*/
/*Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');*/