<?php

namespace App\Tuyendung;

use Illuminate\Database\Eloquent\Model;

class Tuyendung_post extends Model
{
    //
    public function nganhnghe(){
    	return $this->belongsToMany('App\Nganhnghe','tuyendung_post__nganhs');
    }

    public function diadiem_tp(){
    	return $this->belongsTo('App\Diachi\Tinhthanhpho','noilamviec','thanhpho_id');
    }

    public function capbac(){
    	return $this->belongsTo('App\Capbac','capbac_id','id');
    }
}
