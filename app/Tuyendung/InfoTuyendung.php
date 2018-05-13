<?php

namespace App\Tuyendung;

use Illuminate\Database\Eloquent\Model;

class InfoTuyendung extends Model
{
    //
    protected $table = "info_tuyendungs";

   public function tuyendung(){
   	return $this->belongsTo('App\Tuyendung', 'idtuyendung', 'id');
   }

   public function nganhnghe(){
   	return $this->belongsToMany('App\Tuyendung\Nganhnghe', 'info_nganhs');
   }
   


}
