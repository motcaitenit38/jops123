<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable
    {
        use Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name',
            'email',
            'password'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        public function timviec_cv(){
            return $this->hasMany('App\Model\Timviec\TimviecCv','user_id','id');
        }
        public function save_jop(){
            return $this->belongsToMany('App\Model\Tuyendung\TuyendungJob','timviec_luu_jobs');
        }


    }
