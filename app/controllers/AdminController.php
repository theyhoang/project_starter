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

    public function deleteEvent($event_id) {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }

        $events = RushEvent::all();

        foreach($events as $event): {
            if($event_id == $event->event_id) {
                $event->delete();
                break;
            }

        } endforeach;



        return Redirect::to('set_event');

    }

    public function updateRecruit() {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }

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
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }
        $events = RushEvent::all();
        return View::make('set_event',[
            'events' => $events
        ]);
    }

    public function registerEvent() {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }
        $event_name = Input::get('event');

        $event = new RushEvent();
        $event->event = $event_name;
        if(isset($event->event)) {
            $event->save();

        }

        return Redirect::to('set_event');
    }

    public function cacheEvent() {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }
        $event_id = Input::get('event_id');
        if(isset($event_id))
            Cache::put('event_id',$event_id,300);

        return Redirect::to('set_event');
    }


    public function admins() {
        $admins = Admin::all();

        return View::make('admins', [
            'admins' => $admins
        ]);

    }

    public function deleteAdmin($username) {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }
        $admin = Admin::find($username);

        if(isset($admin)) {
            $admin->delete();
        }
        return Redirect::to('admins');
    }

    public function registerAdmin() {
        $loggedIn = Session::get('loggedIn');
        if(!$loggedIn){
            return Redirect::to('admin_login');
        }

        $admin = new Admin();



        $username = Input::get('username');
        $password = Input::get('password');

        if(isset($username) && isset($password)) {
            $input = [$username,$password];
            if($admin->validate($input)){
                $admin->username = $username;
                $admin->password = sha1($password);
                $admin->save();
            }
        }


        return Redirect::to('admins');


    }
} 