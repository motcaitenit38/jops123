<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ListUserController extends Controller
{
    //
    public function listuser(){
    	$user = User::all();
    	$title = "Ứng viên";
    	return view('admin.list-timviec',['user'=>$user,'title'=>$title]);
    }
}
