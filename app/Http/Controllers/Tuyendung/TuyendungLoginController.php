<?php

namespace App\Http\Controllers\Tuyendung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class TuyendungLoginController extends Controller
{
    //
	public function __contruct(){
		$this->middleware('guest:tuyendung');
	}

	public function showLoginForm(){
		return view('tuyendung.login');
	}

	public function submitLogin(Request $request){
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
        if(Auth::guard('tuyendung')->attempt([ 'email'=>$email, 'password'=>$password], $request->remember)){
            return redirect()->route('tuyendung.home');
        }else{
            return redirect()->back()->withInput()->with('thongbao','Email hoặc mật khẩu không đúng');;
        }
	}

    public function logout(Request $request)
    {
        Auth::guard('tuyendung')->logout();
        if (!Auth::check() && !Auth::guard('tuyendung')->check()) {
            $request->session()->flush();
            $request->session()->regenerate();
        }
        return redirect(route('tuyendung.login'));
    }
}
