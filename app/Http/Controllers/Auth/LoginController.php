<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use URL;

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
    protected $redirectTo = 'seeker';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if ( Session::has('pre_login_url') )
            {
                $url = Session::get('pre_login_url');
                Session::forget('pre_login_url');
                return redirect($url);
            }
            else
                return redirect('');
        }
    }

    public function logout(Request $request)
    {
        $this->guard('web')->logout();

        /*if (!Auth::guard('web')->check() && !Auth::guard('employer')->check()) {
            $request->session()->flush();
            $request->session()->regenerate();
        }*/

        return redirect('');
    }



}
