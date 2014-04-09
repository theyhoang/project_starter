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

        $config = array(
            'appId' => '477757815684886',
            'secret' => '3ec86ab7063db93ca7565e8bf76e991d',
        );


   $facebook = new Facebook($config);

   $yen = Cache::get('yen');
   if($yen) {
       echo "<h1>Was cached </h1>";
       var_dump($yen);
   } else {
       echo "<h1>Not cached </h1>";
       $yen =  $facebook->api('THEyenhoang','GET');
       Cache::put('yen',$yen,10);
       var_dump($yen);


   }







});


Route::get('/buzzfeed', function()
{
	$curl = new ITP\Utils\JsonCurl();
	$buzzfeed = new ITP\API\Buzzfeed($curl);

	dd($buzzfeed->get());
});

