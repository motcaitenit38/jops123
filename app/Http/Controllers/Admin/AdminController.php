<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use App\User;
use App\Employer;
use App\Model\Tuyendung\Tuyendungjob;
use App\Model\Timviec\TimviecCv;
use App\Model\Timviec\TimviecUngtuyen;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:tuyendung');
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timviec = User::all()->count();
        $tuyendung = Employer::all()->count();
        $job = Tuyendungjob::all()->count();
        $cv = TimviecCv::all()->count();
        $ungtuyen = TimviecUngtuyen::all()->count();
        return view('admin.home',['timviec'=>$timviec, 'tuyendung'=>$tuyendung,'job'=>$job,'cv'=>$cv,'ungtuyen'=>$ungtuyen]);
    }
}
