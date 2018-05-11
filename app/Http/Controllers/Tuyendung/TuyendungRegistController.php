<?php

namespace App\Http\Controllers\Tuyendung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Tuyendung;

class TuyendungRegistController extends Controller
{
    //
    public function __contruct(){
        $this->middleware('guest:tuyendung');
    }

    public function showRegistForm(){
    	return view('tuyendung.register');
    }

    public function submitRegist(Request $request){
    	$this->validate($request,[
    		'name' => 'required|max:255|min:5',
            'email' => 'required|email|max:255|unique:tuyendungs',
            'password' => 'required|min:6|confirmed',
    	],
    	[
    		'name.min' => 'Tên quá ngắn',
            'name.required' => 'Vui lòng nhập vào họ tên',
            'name.max' => 'Họ tên quá dài',
            'email.required' =>  'Vui lòng nhập vào email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'email quá dài',
            'email.unique' => 'email đã được đăng ký',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => '2 mật khẩu không khớp'

    	]);
    	$tuyendung = new Tuyendung;
    	$tuyendung->name = $request['name'];
    	$tuyendung->email = $request['email'];
    	$tuyendung->password = bcrypt($request['password']);
    	$tuyendung->save();
    	return redirect(route('tuyendung.home'));

    }
}
