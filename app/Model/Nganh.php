<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    //
    public function LinhVuc(){
        return $this->belongsTo(LinhVuc::Class);
    }
}
