<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 4/29/14
 * Time: 7:28 PM
 */

class FacebookController extends BaseController{

    public function login(){
        $config = Cache::get('config');

        if($config) {
            echo "<h1>Config was cached</h1>";
        } else {
            echo "<h1>Config was Not cached </h1>";
            $config = array(
                'appId' => Config::get('facebook.appId'),
                'secret' => Config::get('facebook.secret'),
                'allowSignedRequest' => false
            );
            Cache::put('config',$config,10);
        }

        $facebook = new Facebook($config);

        //return View::make('fb_login', [
          //  'facebook' => $facebook
        //]);

        $user_id = $facebook->getUser();
        if($user_id) {

            // We have a user ID, so probably a logged in user.
            // If not, we'll get an exception, which we handle below.
            try {

                $user_profile = $facebook->api('/me','GET');

                return Redirect::to('profile');


            } catch(FacebookApiException $e) {
                // If the user is logged out, you can have a
                // user ID even though the access token is invalid.
                // In this case, we'll get an exception, so we'll
                // just ask the user to login again here.
                $login_url = $facebook->getLoginUrl();
                echo 'Please <a href="' . $login_url . '">login.</a>';
                error_log($e->getType());
                error_log($e->getMessage());
            }
        } else {

            // No user, print a link for the user to login
            $login_url = $facebook->getLoginUrl();
            echo 'Please <a href="' . $login_url . '">login.</a>';

        }
    }


} 