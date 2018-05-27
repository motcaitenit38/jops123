<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Employer extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'employer';

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

//    quan hệ 1-1 với hồ sơ công ty (1 công ty có 1 hồ sơ)

        public function employer_info()
        {
            return $this->hasOne('App\Employter\Employer_info', 'employer_id', 'id');
        }



    }
