<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected $table = 'careers';
    public function jop(){
        return $this->belongsToMany('App\Employer\Jop','career_jop');
    }
}
