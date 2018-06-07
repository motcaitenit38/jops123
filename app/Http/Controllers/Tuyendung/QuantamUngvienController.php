<?php

namespace App\Http\Controllers\Tuyendung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tuyendung\TuyendungQuantamTimviec;

class QuantamUngvienController extends Controller
{
    //
    public function check($id){
        $all_quantam = TuyendungQuanttamTimviec::where('employer_id',Auth::user()->id)->get();
        foreach ($all_quantam->thongtin_timviec_id as $quantam){
            if($quantam->thongtin_timviec_id == $id){

            }
        }
        dd($all_quantam->thongtin_timviec_id);
//       $getdulieu = TuyendungQuanttamTimviec::where('thongtin_timviec_id',$id)->get();
    }
}
