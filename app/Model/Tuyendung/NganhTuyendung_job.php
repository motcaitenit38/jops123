<?php

namespace App\Model\Tuyendung;

use Illuminate\Database\Eloquent\Model;

class NganhTuyendung_job extends Model
{
    //
    public function nganh_jop(){
        return $this->belongsToMany(TuyendungJob::Class,'nganh_tuyendung_jobs');
    }
}
