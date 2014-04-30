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

Route::get('/login','FacebookController@login');

Route::get('/tweets', function()
{
    $json = Cache::get('twitter-uscitp');

    if (!$json) {
        $twitterApi = new Tang\TwitterRestApi\TwitterApi([
            'api_key' => Config::get('twitter.api_key'),
            'api_secret' => Config::get('twitter.api_secret')
        ]);

        $json = $twitterApi->authenticate()->get('statuses/user_timeline', [
            'screen_name' => 'uscitp',
            'count' => 10,
            'exclude_replies' => true
        ]);

        Cache::put('twitter-uscitp', $json, 10);
    }

    header('Content-type: application/json');
    echo $json;
});

Route::get('/profile', function()
    {

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

    $user_profile = $facebook->api('/me','GET');
    echo "Name: " . $user_profile['name'] . "<br>";
    echo "facebook_id: " . $user_profile['id'] . "<br>";
    echo "hometown: " . $user_profile['hometown']['name'] . "<br>";

    foreach($user_profile["education"] as $education) {
        if($education["type"] == "High School") {
            $highschool = $education["school"]["name"];
            break;
        }
    }

    //echo "education: " . var_dump($user_profile["education"]) . "<br>";
    echo "high school: " . $highschool . "<br>";
    echo "user_profile: <br>";


    var_dump($user_profile);

   $params = array( 'next' => 'http://localhost:8000/logout' );
   echo "<br><a href='". $facebook->getLogoutUrl($params) . "'>logout</a>";




});

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
    echo "<h1>Logged Out</h1>";


});


Route::get('/buzzfeed', function()
{
	$curl = new ITP\Utils\JsonCurl();
	$buzzfeed = new ITP\API\Buzzfeed($curl);

	dd($buzzfeed->get());
});

