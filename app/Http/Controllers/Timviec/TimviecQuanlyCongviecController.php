<?php

namespace App\Http\Controllers\Timviec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Timviec\TimviecCv;
use App\Model\Tuyendung\TuyendungJob;
use App\Model\Timviec\TimviecUngtuyen;

class TimviecQuanlyCongviecController extends Controller
{
    //
    public function daungtuyen(){
        $all_cv = TimviecCv::where('user_id',Auth::user()->id)->get();
        $all_job = array();
        foreach ($all_cv as $cv){
            $jop = TimviecUngtuyen::where('timviec_cv_id',$cv->id)->get();
//            dd($cv);
            array_push($all_job,$jop);
        }
        dd($all_job);
        return view('timviec.quanlycongviec.daungtuyen');
    }
}
