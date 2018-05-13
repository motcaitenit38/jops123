<?php

namespace App\Tuyendung;

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
}
