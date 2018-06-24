<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employer;

class ListEmployerController extends Controller
{
    //
    public function listuser(){
    	$user = Employer::all();
    	$title = "Nhà tuyển dụng";
    	return view('admin.list-timviec',['user'=>$user,'title'=>$title]);
    }
}
