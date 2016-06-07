<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Bican\Roles\Models\Role;
use App\Http\jmHelper;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'zip_code' => 'required',
		]);
	}
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
            $role = 1; // regular members
            $actKey = str_random(15);
            $user =   User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'zip_code' => $data['zip_code'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'zip_code' => $data['zip_code'],
                    'status'=>1,
                    'user_type'=>1,
            ]);
            //\Session::flash("flash_message"," Your account has been created, shortly you will receive an email with some instructions on how to activate your account."); 
            \Session::flash("flash_message"," Your account has been created, You can now login into your account");             
            User::find($user->id)->attachRole($role); 
            return $user;
                
	}
        
        
        
        

}
