<?php

namespace App\Http\Controllers\Homepage\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginHomepageRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    protected function guard()
    {
        return Auth::guard('user');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['showLoginForm','authenticate']);
    }

    public function showLoginForm()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('homepage.home');
        }
        return view('homepage.auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return
     *
     */
    public function authenticate(LoginHomepageRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember_token') ? true : false;
        if (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect('/home');
        }
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect('/home');
    }
}
