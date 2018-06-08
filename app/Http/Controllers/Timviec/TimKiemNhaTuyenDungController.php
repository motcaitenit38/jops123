<?php

namespace App\Http\Controllers\Timviec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimKiemNhaTuyenDungController extends Controller
{
    //
    public function formtimkiem(){
        return view('timviec.timcongty.form');
    }
    public function timkiem(Request $request){

    }
}
