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
            'password',
            'active',
            'phone_number',
            'address',
            'avatar',
            'active'
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

        public function seeker_cv(){
            return $this->hasMany('App\Seeker\Seeker_cv','user_id','id');
        }
        public function save_jop(){
            return $this->belongsToMany('App\Employer\Jop','jop_user');
        }


    }
