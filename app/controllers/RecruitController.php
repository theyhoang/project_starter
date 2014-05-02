<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 4/30/14
 * Time: 9:36 PM
 */

class RecruitController extends BaseController{

    public function login() {

        return View::make('login');
    }

    public function register() {

        return View::make('register');
    }

    public function process() {
        $validation = User::validate(Input::all());

        if($validation->passes()) {
            echo "PASSED";
            $user = new User();
            $user->name = Input::get('name');
            $user->address = Input::get('address');
            $user->email = Input::get('email');
            $user->phone_number = Input::get('phone_number');
            $user->grad_year = Input::get('grad_year');
            $user->facebook_id = Input::get('facebook_id');
            $user->profile_picture = Input::get('profile_picture');
            $user->student_id = Input::get('student_id');
            //echo "student_id: " . $user->student_id;
            $user->save();

            return Redirect::to('login')
                ->with('success', 'Successfully Registered');
        }

        return Redirect::to('register')
            ->with('errors',$validation->messages());

    }

}