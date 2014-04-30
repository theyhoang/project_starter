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

        return View::make('login', [
            'config' => $config
        ]);

        //$facebook = new Facebook($config);
    }

} 