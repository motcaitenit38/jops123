<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Employer_home_Controller extends Controller
{
    //
    public function index(){
        return view('employer.index');
    }
}
