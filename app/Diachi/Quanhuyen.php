<?php

namespace App\Diachi;

use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    //
    protected $table = 'quanhuyen';

    public function tinhthanhpho(){
    	return $this->belongsTo('App\Diachi\Tinhthanhpho','matp','id');
    }

    public function xaphuong(){
    	return $this->hasMany('App\Diachi\Xaphuong','maqh','id');
    }
}
