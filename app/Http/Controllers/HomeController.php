<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diachi\Tinhthanhpho;
use App\Diachi\Quanhuyen;
use App\Diachi\Xaphuong;

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

    public function diachi(){
        $tinh = Quanhuyen::find(542)->tinhthanhpho()->get()->toArray();
        dd($tinh);

        foreach ($tinh[0]->Quanhuyen() as $value) {
            echo $value;
        }
        
    }
}
