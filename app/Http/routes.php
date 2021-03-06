<?php
use App\Repositories\OffertRepository;
use App\Repositories\LifeStyleRepository;
use App\Repositories\ScheduleRepository;
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
use App\Repositories\TrainingRepository;
use App\Repositories\PostRepository;
use App\Repositories\OpportunityAntrenamentRepository;

Route::bind('event', function ($slug) {
    if ($event = (new EventRepository)->findBySlug($slug))
        return $event;
    abort('404');
});

Route::bind('training', function ($slug) {
    if ($training = (new TrainingRepository)->findBySlug($slug))
        return $training;
    abort('404');
});
Route::bind('post', function ($slug) {
    if ($post = (new PostRepository)->findBySlug($slug))
        return $post;
    abort('404');
});
Route::bind('service', function ($slug) {
    if ($service = (new OpportunityAntrenamentRepository)->findBySlug($slug))
        return $service;
    abort('404');
});
Route::bind('schedule', function ($slug) {
    if ($schedule = (new ScheduleRepository)->findBySlug($slug))
        return $schedule;
    abort('404');
});
Route::multilingual(function () {
    Route::get('oauth', [
        'as' => 'oauthCallback',
        'uses' => 'gCalendarController@oauth'
    ]);
    Route::get('add-google-event/{gevent}', [
        'as' => 'add-to-calendar',
        'uses' => 'gCalendarController@store'
    ]);
    Route::get('calendar', [
        'as' => 'get_calendar',
        'uses' => 'gCalendarController@index'
    ]);

    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
    Route::get('page/{static_page}.html', [
        'as' => 'show_page',
        'uses' => 'PagesController@show'
    ]);
    Route::get('pages/{static_page}.html', [
        'as' => 'show_trener_page',
        'uses' => 'PagesController@trener'
    ]);
/*  Route::get('events', [
        'as' => 'events',
        'uses' => 'EventController@index'
    ]);*/
    Route::get('events/{category?}', [
        'as' => 'view_events',
        'uses' => 'CategoryEventsController@index'
    ]);
    Route::get('membership', [
        'as' => 'view_membership',
        'uses' => 'MembershipController@index'
    ]);
    Route::get('calc', [
        'as' => 'view_calc',
        'uses' => 'CalcController@calc'
    ]);
    Route::get('calc/calories', [
        'as' => 'view_calories',
        'uses' => 'CalcController@calories'
    ]);
    Route::get('event/{event}', [
        'as' => 'view_event',
        'uses' => 'EventController@show'
    ]);
    Route::get('faq', [
        'as' => 'view_faq',
        'uses' => 'FaqController@index'
    ]);
    Route::get('trainings', [
        'as' => 'view_trainings',
        'uses' => 'CategoryTrainingsController@indexAdult'
    ]);
    Route::get('trainings-kids', [
        'as' => 'view_trainings_kids',
        'uses' => 'CategoryTrainingsController@indexKids'
    ]);
    Route::get('training/{training}', [
        'as' => 'view_training',
        'uses' => 'TrainingController@show'
    ]);

    Route::get('teams/{slug?}', [
        'as' => 'view_team',
        'uses' => 'TeamController@index'
    ]);
    Route::get('trener/{slug?}', [
        'as' => 'view_trener',
        'uses' => 'TeamController@trener'
    ]);
    Route::get('schedule', [
        'as' => 'view_schedule',
        'uses' => 'ScheduleController@index'
    ]);
    Route::get('schedule/{schedule?}', [
        'as' => 'get_schedule',
        'middleware' => 'accept-ajax',
        'uses' => 'ScheduleController@show'
    ]);
    Route::get('partners/{slug?}', [
        'as' => 'view_partner',
        'uses' => 'PartnerController@index'
    ]);
    Route::get('all-partners', [
        'as' => 'view_all_partners',
        'uses' => 'PartnerController@partner'
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
    Route::get('mission', [
        'as' => 'mission_page',
        'uses' => 'PagesController@mission'
    ]);
    Route::get('presa', [
        'as' => 'press_show',
        'uses' => 'PressController@show'
    ]);

    Route::get('world', [
        'as' => 'view_world',
        'uses' => 'WorldController@index'
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
    Route::get('fitness-service/{service}', [
        'as' => 'view_fitness_service',
        'uses' => 'FitnessOferteController@service'
    ]);
    Route::get('fitness/{service}/{type?}', [
        'as' => 'view_fitness',
        'uses' => 'FitnessOferteController@show'
    ]);
    Route::get('beauty-spa', [
        'as' => 'beauty_show',
        'uses' => 'BeautyController@show'
    ]);

    Route::post('subscribe',[
        'as'  =>'subscribe',
        'uses'=>'SubscribersController@subscribe'
    ]);

    Route::get('contacts', [
            'as' =>'contact_page',
            'uses' => 'ContactController@index'
        ]);
    Route::get('call-back/{id}/{name}', [
        'as' =>'call_page',
        'uses' => 'ContactController@callBack'
    ]);
    Route::get('enter-club', [
        'as' =>'join_member',
        'uses' => 'ContactController@member'
    ]);
    Route::post('send-contact', [
        'as' =>'send_contact_form',
        'uses' => 'ContactController@sendForm'
    ]);

    Route::post('call-us', [
        'as' =>'send_call_ajax',
        'uses' => 'ContactController@ajaxForm'
    ]);
    Route::post('enter-club-send', [
        'as' =>'enter_club_send_form',
        'uses' => 'ContactController@joinClub'
    ]);




});
/*Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('login', 'Keyhunter\Administrator\AuthController@getLogin');
    Route::post('login', 'Keyhunter\Administrator\AuthController@postLogin');
    Route::get('logout', 'Keyhunter\Administrator\AuthController@logout');
});*/
/*Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');*/