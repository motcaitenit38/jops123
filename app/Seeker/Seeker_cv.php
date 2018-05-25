<?php

    namespace App\Seeker;

    use Illuminate\Database\Eloquent\Model;

    class Seeker_cv extends Model
    {
        //
        public function jop()
        {
            return $this->belongsToMany('App\Employer\Jop', 'jop_seeker_cv');
        }
    }
