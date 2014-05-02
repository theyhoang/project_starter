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

