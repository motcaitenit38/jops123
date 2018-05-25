<?php

namespace App\Http\Controllers\Seeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Seeker_Home_Controller extends Controller
{
    //
    public function index(){
        return view('seeker.index');
    }
}
