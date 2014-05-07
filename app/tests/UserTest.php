<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 5/6/14
 * Time: 8:54 PM
 */

class UserTest extends TestCase{

    public function testUserValidate(){


        $email = "yenh@usc.edu";
        $name = "Yen";
        $student_id = "9999999";
        $phone_number = "4053652988";
        $highschool = "Westmoore High School";
        $hometown = "Oklahoma City";
        $grad_year = 2014;
        $facebook_id = 999;

        $input = [$email,$name,$student_id,$phone_number,$highschool,$hometown,$grad_year,$facebook_id];

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
        $user->$grad_year = 2014;
        $user->$facebook_id = 999;

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