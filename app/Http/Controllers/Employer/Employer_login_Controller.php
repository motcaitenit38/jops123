<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Employer;

class Employer_login_Controller extends Controller
{
    //
    public function __contruct()
    {
        $this->middleware('guest:employer');
    }

    public function showLoginForm()
    {
        return view('employer.login');
    }

    public function submitLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ],
            [
                'email.required' => 'Vui lòng nhập địa chỉ email của bạn',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu đăng nhập'
            ]);

        $email = $request['email'];
        $password = $request['password'];
        if (Auth::guard('employer')->attempt(['email' => $email, 'password' => $password], $request->remember)) {
            return redirect()->route('employer.index');
        } else {
            return redirect()->back()->withInput()->with('thongbao', 'Email hoặc mật khẩu không đúng');;
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('employer')->logout();
        if (!Auth::guard('web')->check() && !Auth::guard('employer')->check()) {
            $request->session()->flush();
            $request->session()->regenerate();
        }

        return redirect(route('employer.login'));
    }

}
