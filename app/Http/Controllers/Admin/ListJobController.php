<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tuyendung\TuyendungJob;

class ListJobController extends Controller
{
    //
    public function listjob(){
    	$job = Tuyendungjob::all();
    	return view('admin.list-job',['job'=>$job]);
    }
}
