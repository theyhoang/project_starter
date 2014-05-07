<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/chat', function()
{
  return View::make('chat');
});

Route::get('/fb_login','FacebookController@login');

Route::get('/login','RecruitController@login');

Route::get('/register','RecruitController@register');

Route::get('/fb_profile', "FacebookController@profile");

Route::post('/process', "RecruitController@process");

Route::post('/authenticate',"RecruitController@authenticate");

Route::get('/admin_login',"AdminController@login");

Route::post('/admin_authenticate',"AdminController@authenticate");

Route::get('/admin_home',"AdminController@home");

Route::get('/admin_logout',"AdminController@logout");

Route::get('/set_event',"AdminController@setEvent");

Route::post('/update_recruit/', "AdminController@updateRecruit");

Route::get('/view_recruit/{id}', "AdminController@viewRecruit");

Route::get('/delete_event/{event_id}', "AdminController@deleteEvent");

Route::get('/recruit_profile', "AdminController@recruitProfile");

Route::post('/register_event',"AdminController@registerEvent");

Route::post('/cache_event',"AdminController@cacheEvent");
