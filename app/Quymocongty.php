<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quymocongty extends Model
{
    //quan hệ một nhiều với info tuyển dụng
    public function infotuyendung(){
    	return $this->hasMany('App\Tuyendung\InfoTuyendung', 'idtuyendung','id');
    }
}
