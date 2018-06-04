<?php

    namespace App\Model\Timviec;

    use Illuminate\Database\Eloquent\Model;

    class TimviecCv extends Model
    {
        //
        protected $fillable = [
            'nganh_id',
            'ten_cv',
            'diachi_id',
            'gia_tri_hop_dong_lon',
            'so_nam_kinh_nghiem',
            'thiet_bi',
            'gioi_thieu',
        ];
        public function nganh(){
            return $this->belongsTo('App\Model\Nganh','nganh_id','id');
        }
        public function address(){
            return $this->belongsTo('App\Model\Address','diachi_id','thanhpho_id');
        }
    }
