<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 5/1/14
 * Time: 6:42 PM
 */

class Admin extends Eloquent{
    protected $table = "admins";
    public $timestamps = false;


    public function validate($input) {
        return Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
    }

} 