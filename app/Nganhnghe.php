<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nganhnghe extends Model
{
    //
    protected $table = "nganhnghes";    

   public function info(){
   	return $this->belongsToMany('App\Tuyendung\InfoTuyendung');
   }

   public function infonganh(){
   	return $this->belongsToMany('App\Tuyendung\InfoTuyendung', 'info_nganhs');
   }

   public function chitietcongviec(){
    	return $this->belongsToMany('App\Tuyendung\Chitietcongviec','chitietcongviec_nganh');
    }
}
