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

Route::get('/logout', function() {

    $config = Cache::get('config');

    if($config) {
        echo "<h1>Config was cached</h1>";
    } else {
        echo "<h1>Config was Not cached </h1>";
        $config = array(
            'appId' => Config::get('facebook.appId'),
            'secret' => Config::get('facebook.secret'),
        );
        Cache::put('config',$config,10);
    }

    $facebook = new Facebook($config);
    $facebook->destroySession();
    return Redirect::to('login');
});


Route::get('/buzzfeed', function()
{
	$curl = new ITP\Utils\JsonCurl();
	$buzzfeed = new ITP\API\Buzzfeed($curl);

	dd($buzzfeed->get());
});

