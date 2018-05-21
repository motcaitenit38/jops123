<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nganhnghe;
use App\Diachi\Quanhuyen;
use App\Diachi\Tinhthanhpho;
use App\Diachi\Xaphuong;

class DiadiemController extends Controller
{
    //
    public function getquanhuyen($idthanhpho){
    	// dd($idthanhpho);
    	$quanhuyen = Quanhuyen::where('matp',$idthanhpho)->get();
    	// dd($quanhuyen);
    	foreach ($quanhuyen as $value) {
    		echo "<option value='".$value->quanhuyen_id."'>".$value->name."</option>";
    	}
    }

    public function getxaphuong($idquanhuyen){
    	// dd($idthanhpho);
    	$xaphuong = Xaphuong::where('maqh',$idquanhuyen)->get();
    	// dd($quanhuyen);
    	foreach ($xaphuong as $value) {
    		echo "<option value='".$value->xaphuong_id."'>".$value->name."</option>";
    	}
    }
}
