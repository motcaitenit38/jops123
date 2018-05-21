<?php

namespace App\Tuyendung;

use Illuminate\Database\Eloquent\Model;

class Tuyendung_info extends Model
{
    //
    protected $table = "tuyendung_infos";

    // quan hệ một một userTuyendung với InfoTuyendung 
  public function tuyendung(){
    return $this->belongsTo('App\Tuyendung', 'tuyendung_id', 'id');
  }
   // quan hệ nhiều nhiều infotuyendungs với nganhnghes
  public function nganhnghe(){
    return $this->belongsToMany('App\Nganhnghe', 'tuyendung_info_nganhs');
  }
  // // quan hệ một một với quy mô công ty
  public function quymo(){
    return $this->belongsTo('App\Quymocongty','quymo_id','id');
  }

  public function diadiem_tp(){
    return $this->belongsTo('App\Diachi\Tinhthanhpho','diachi_tp','thanhpho_id');
  }
}
