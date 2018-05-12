<?php

namespace App\Tuyendung;

use Illuminate\Database\Eloquent\Model;
use App\Tuyendung;

class InfoTuyendung extends Model
{
    //
    protected $table = "info_tuyendungs";

   public function tuyendung(){
   	return $this->belongsTo('App\Tuyendung', 'idtuyendung', 'id');
   }

}
