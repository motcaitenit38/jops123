<?php

namespace App\Diachi;

use Illuminate\Database\Eloquent\Model;

class Tinhthanhpho extends Model
{
    //
    protected $table = 'tinhthanhpho';
    
    public function quanhuyen(){
    	return $this->hasMany('App\Diachi\Quanhuyen','matp','id');
    }
}
