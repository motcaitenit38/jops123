<?php

namespace App\Diachi;

use Illuminate\Database\Eloquent\Model;

class Xaphuong extends Model
{
    //
    protected $table='xaphuongthitran';
    public function quanhuyen(){
    	return $this->belongsTo('App\Diachi\Quanhuyen','maqh','id');
    }
}
