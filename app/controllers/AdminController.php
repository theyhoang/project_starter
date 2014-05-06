<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 5/1/14
 * Time: 6:36 PM
 */

class AdminController extends BaseController {

    public function login() {
        //Session::flush();

        $loggedIn = Session::get('loggedIn');
        if($loggedIn){
            return Redirect::to('admin_home');
        }


        return View::make('admin_login');

    }

    public function authenticate() {


        $username = Input::get('username');
        $password = sha1(Input::get('password'));
        $admins = Admin::all();

        foreach ($admins as $admin) {

            if($admin->username == $username && $admin->password == $password){
                Session::put('loggedIn',true);

                return Redirect::to('admin_home');
            }
        }

        return Redirect::to('admin_login')
            ->with('error',"Login failed.");


    }

    public function home() {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }
        else {
            $users = User::all();
            return View::make('home',[
                'users' => $users
            ]);
        }

    }

    public function logout() {
        Session::flush();

        return Redirect::to('admin_login');

    }

    public function updateRecruit($id) {
            $user = User::find($id);

            return View::make('update_recruit', [
                'user' => $user
            ]);
    }

} 