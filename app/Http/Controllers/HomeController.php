<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function array(){
        $a = 'truong';
        $b = 'le';
        $array = [];
        $array['ho'] =$b;
        $array['ten'] =$a;
        dd($array);
        return view('welcome')->with('array',$array);
    }
}
