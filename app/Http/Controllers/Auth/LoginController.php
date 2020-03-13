<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
      return ['email'=>$request->{$this->username()}, 'password'=>$request->password, 'verified'=>'1'];
        // return $request->only($this->username(), 'password');
    }

    public function redirectToProvider(){
      // return "hi";
      return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(){
      $google_user = Socialite::driver('google')->user();
      $user = User::whereEmail($google_user->getEmail())->first();
      if(!$user){
        $user = User::create([
            'name' => $google_user->getName(),
            'email' => $google_user->getEmail(),
            'password' => bcrypt($google_user->getId()),
        ]);
      }
      auth()->loginUsingId($user->id);
      return redirect('/home');
    }
}
