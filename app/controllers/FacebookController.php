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
        } else {
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

                return Redirect::to('fb_profile');


            } catch(FacebookApiException $e) {
                // If the user is logged out, you can have a
                // user ID even though the access token is invalid.
                // In this case, we'll get an exception, so we'll
                // just ask the user to login again here.
                $login_url = $facebook->getLoginUrl(array('scope' => 'email'));
                echo 'Please <a href="' . $login_url . '">login.</a>';
                error_log($e->getType());
                error_log($e->getMessage());
            }
        } else {

            // No user, print a link for the user to login
            $login_url = $facebook->getLoginUrl(array('scope' => 'email'));
            echo 'Please <a href="' . $login_url . '">login.</a>';

        }
    }

    public function profile() {
        $config = Cache::get('config');

        if($config) {
        } else {
            $config = array(
                'appId' => Config::get('facebook.appId'),
                'secret' => Config::get('facebook.secret'),
            );
            Cache::put('config',$config,10);
        }



        $facebook = new Facebook($config);

        $user_id = $facebook->getUser();
        if($user_id) {

            // We have a user ID, so probably a logged in user.
            // If not, we'll get an exception, which we handle below.
            try {

                $user_profile = $facebook->api('/me?scope=email','GET');


            } catch(FacebookApiException $e) {
                // If the user is logged out, you can have a
                // user ID even though the access token is invalid.
                // In this case, we'll get an exception, so we'll
                // just ask the user to login again here.
                $login_url = $facebook->getLoginUrl(array('scope' => 'email'));
                echo 'Please <a href="' . $login_url . '">login.</a>';
                error_log($e->getType());
                error_log($e->getMessage());
            }
        } else {

            return Redirect::to('login');

        }

        //$user_profile = $facebook->api('/me','GET');

        //echo "Name: " . $user_profile['name'] . "<br>";
        //echo "facebook_id: " . $user_profile['id'] . "<br>";
        //echo "hometown: " . $user_profile['hometown']['name'] . "<br>";

        $name = $user_profile['name'];
        $facebook_id = $user_profile['id'];
        $hometown = $user_profile['hometown']['name'];

        foreach($user_profile["education"] as $education) {
            if($education["type"] == "High School") {
                $highschool = $education["school"]["name"];
            }
            if($education["type"] == "College" && $education["school"]["name"] == "University of Southern California") {
                $grad_year = $education["year"]["name"];
            }
        }


        //echo "education: " . var_dump($user_profile["education"]) . "<br>";
        //echo "high school: " . $highschool . "<br>";

        $email = $user_profile["email"];

        $fb_pic = "http://graph.facebook.com/".$user_profile['id']."/picture?type=large";
        //echo "fb_pic: <a href='" . $fb_pic . "'>facebook_profile_pic</a><br>";

        //echo "email: $email";
        //echo "user_profile: <br>";



        //var_dump($user_profile);
        $params = array( 'next' => 'http://localhost:8000/register' );
        echo "<br><a href='". $facebook->getLogoutUrl($params) . "'>logout</a>";
        echo "logout_url: " . $facebook->getLogoutUrl($params);

        $logout_url = $facebook->getLogoutUrl($params);

        $facebook->destroySession();

        Cache::put('email',$email,1);
        Cache::put('name',$name,1);
        Cache::put('facebook_id',$facebook_id,10);
        Cache::put('hometown',$hometown,1);
        Cache::put('highschool',$highschool,1);
        Cache::put('grad_year',$grad_year,1);
        Cache::put('fb_pic',$fb_pic,10);


        return Redirect::to($logout_url);


    }


} 