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

        public function career(){
            return $this->belongsTo('App\Career','career_id','id');
        }
        public function user(){
            return $this->belongsTo('App\User','user_id','id');
        }
    }
