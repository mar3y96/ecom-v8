<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $sicialUser = Socialite::driver($provider)->user();
        // return $sicialUser->email;
        $user = User::where('email',$sicialUser->email)->first();
        if ($user) {
            Auth::login($user);
        }
        else {
            $names = explode(" ",$sicialUser->name);
            $user = User::create([
                'f_name'=>$names[0],
                'l_name'=>$names[1],
                'email'=>$sicialUser->email,
                'city_id'=>'Cairo',
                'gender'=>'male',
                'password'=>'1234561'
            ]);
            Auth::login($user);
        }
        return  redirect()->to('profile');
    }
}
