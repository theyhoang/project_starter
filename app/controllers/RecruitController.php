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

}