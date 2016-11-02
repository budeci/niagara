<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Request;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    public function handleProviderCallback()
    {
		if(Request::input("error_code") != "200"){
			try {
				$socialUser = Socialite::driver('facebook')->user();
			} catch (Exception $e) {
				return redirect()->to('/');
			}

			$user = User::where('sns_acc_id',$socialUser->id)->first();
			if (!$user) {
				User::create([
					'name'         => $socialUser->name,
					'email'        => $socialUser->email,
					'avatar_url'   => $socialUser->avatar_original,
					'sns_acc_id'   => $socialUser->id,
					'role_id'      => (int)1,
					'active'       => (int)1,
					'account_type' => 'facebook'
				]);
			}
			$user = User::where('sns_acc_id',$socialUser->id)->first();
			
			
			//Auth::login($user);
			auth()->login($user);
			return redirect()->to(route('particip'));
			// $user->token;	
		}else{
			return redirect()->to('/');
		}
    }

}