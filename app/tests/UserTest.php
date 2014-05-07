<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 5/6/14
 * Time: 8:54 PM
 */

class UserTest extends TestCase{

    public function testUserValidate(){
        'email' => 'required|email',
            'name' => 'required|min:3',
            'student_id' => 'required|numeric|unique:users',
            'phone_number' => 'required|numeric|min:10',
            'highschool' => 'required|min:3',
            'hometown' => 'required|min:3',
            'grad_year' => 'required|integer|min:4',
            'facebook_id' => 'integer',
            'profile_picture' => 'url'

        $email = "yenh@usc.edu";
        $name = "Yen";
        $student_id = "9999999";
        $phone_number = "4053652988";
        $highschool = "Westmoore High School";
        $hometown = "Oklahoma City";

        $input = [$email,$name,$student_id,$phone_number,$highschool,$hometown];

        $this->assertTrue(User::validate($input));
    }

    public function testUserAdd(){

        $user = new User();
        $user->email = "yenh@usc.edu";
        $user->name = "Yen";
        $user->student_id = "9999999";
        $user->phone_number = "4053652988";
        $user->highschool = "Westmoore High School";
        $user->hometown = "Oklahoma City";

        $user->save();

        $users = User::all();
        $check = false;
        foreach($users as $user_check): {
            if($user_check->student_id == $user->student_id) {
                $check = true;
                break;
            }
        } endforeach;

        $this->assertTrue($check);
    }


} 