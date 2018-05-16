<?php

namespace App\Tuyendung;

use Illuminate\Database\Eloquent\Model;

class InfoTuyendung extends Model
{
    //
  protected $table = "info_tuyendungs";

    // quan hệ một một userTuyendung với InfoTuyendung 
  public function tuyendung(){
    return $this->belongsTo('App\Tuyendung', 'idtuyendung', 'id');
  }
   // quan hệ nhiều nhiều infotuyendungs với nganhnghes
  public function nganhnghe(){
    return $this->belongsToMany('App\Nganhnghe', 'info_nganhs');
  }
  // quan hệ một một với quy mô công ty
  public function quymo(){
    return $this->belongsTo('App\Quymocongty','idtuyendung','id');
  }
}
