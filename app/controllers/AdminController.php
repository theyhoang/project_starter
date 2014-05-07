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

    public function viewRecruit($id) {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }

            $user = User::find($id);

            return Redirect::to('recruit_profile')->with('user',$user);
    }

    public function updateRecruit() {
        $id = Input::get('id');

        $status_id = Input::get('status');

        $user = User::find($id);

        $user->status_id = $status_id;

        $user->save();

        if($user->status_id == 3) {
            $user->delete();
        }

        return Redirect::to('admin_home');
    }

    public function recruitProfile() {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }

            return View::make('recruit_profile');

    }

    public function setEvent() {
        $events = RushEvent::all();
        return View::make('set_event',[
            'events' => $events
        ]);
    }

    public function registerEvent() {
        $event_name = Input::get('event');

        $event = new RushEvent();
        $event->event = $event_name;
        if(isset($event->event)) {
            $event->save();

        }

        return Redirect::to('set_event');
    }

    public function cacheEvent() {
        $event_id = Input::get('event_id');
        if(isset($event_id))
            Cache::put('event_id',$event_id,300);

        return Redirect::to('set_event');
    }

} 