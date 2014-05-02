<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    public $timestamps = false;

    public static function validate($input) {
        return Validator::make($input, [
            'email' => 'required|email',
            'name' => 'required|min:3',
            'student_id' => 'required|numeric',
            'phone_number' => 'required|numeric|min:10',
            'highschool' => 'required|min:3',
            'hometown' => 'required|min:3',
            'grad_year' => 'required|numeric|min:4',
            'facebook_id' => 'integer',
            'profile_picture' => 'url'
        ]);
    }

}