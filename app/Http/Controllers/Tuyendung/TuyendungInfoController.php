<?php

namespace App\Http\Controllers\Tuyendung;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tuyendung\InfoTuyendung;
use App\Tuyendung;

class TuyendungInfoController extends Controller
{
    //
    public function getAdd(){
    	return view('tuyendung.tuyendung-info.add');
    }

    public function postAdd(Request $request){
    	var_dump($request->all());
    	 echo (Auth::user()->id);
    }
     public function getthongtin(){
     	$info = Tuyendung::find(Auth::user()->id)->thongtin()->get();
     	return view('tuyendung.tuyendung-info.get', ['info'=>$info]);
     }
}
