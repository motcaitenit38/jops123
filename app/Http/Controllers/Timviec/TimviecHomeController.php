<?php

namespace App\Http\Controllers\Timviec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimviecHomeController extends Controller
{
    //
    public function home(){
        return view('timviec.index');
    }
}
