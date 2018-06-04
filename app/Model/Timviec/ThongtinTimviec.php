<?php

namespace App\Model\Timviec;

use Illuminate\Database\Eloquent\Model;

class ThongtinTimviec extends Model
{
    //
    protected $fillable= [
        'ten_doanh_nghiep',
        'dien_thoai',
        'website',
        'dia_diem_id',
        'dia_diem_cuthe',
        'ma_so_thue',
        'von_dieu_le',
        'nam_thanh_lap',
        'loai_hinh_doanh_nghiep',
        'dien_tich_quy_mo',
        'so_luong_day_chuyen',
        'tong_cong_suat',
        'file_dinh_kem_kinh_doanh',
        'file_dinh_kem_thong_tin_cong_ty',
        'gioi_thieu_cong_ty',
    ];
    public function Address(){
        return $this->belongsTo('App\Model\Address','dia_diem_id','thanhpho_id');
    }
}
