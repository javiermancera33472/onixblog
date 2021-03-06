<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests\PasswordRessetRequest;



class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
        
        
        public function resetPassword($token=null)
        {  
            if (!is_null($token))
            {
                $resets = \App\PasswordResets::where('token', '=', $token)->get();                
                if (isset($resets['0']))
                {
                    return view('auth.reset',compact('token'));
                }
            }
            return redirect('/');
        }
        
        

}
