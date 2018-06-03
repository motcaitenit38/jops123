<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LinhVuc extends Model
{
    //
    public function Nganh(){
        return $this->hasMany(Nganh::Class);
    }
}
