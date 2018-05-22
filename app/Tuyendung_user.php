<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Tuyendung_user extends Authenticatable
{
    use Notifiable;
    protected $table = "tuyendung_users";
    public function thongtin(){
    return $this->hasOne('App\Tuyendung\InfoTuyendung', 'idtuyendung', 'id');
   }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}