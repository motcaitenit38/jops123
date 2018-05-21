<?php

namespace App\Timviec;

use Illuminate\Database\Eloquent\Model;

class Timviec_info extends Model
{
    //
    protected $table = "timviec_infos";
    public function timviec(){
    	return $this->belongTo('App\User','timviec_id','id');
    }
    public function quymo(){
    	return $this->hasOne('App\Quymocongty','id','idquymo');
    }
    public function nganhnghe(){
    	return $this->belongsToMany('App\Nganhnghe','timviec_info_nganhnghe');
    }
}
