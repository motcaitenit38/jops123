<?php

    namespace App\Model\Tuyendung;

    use Illuminate\Database\Eloquent\Model;

    class ThongtinTuyendung extends Model
    {
        //
        protected $fillable = [
            'ten_doanh_nghiep',
            'dien_thoai',
            'website',
            'dia_diem_id',
            'dia_diem_cuthe',
            'ma_so_thue',
            'von_dieu_le',
            'nam_thanh_lap',
            'loai_hinh_doanh_nghiep',
            'gioi_thieu_cong_ty',
        ];

        public function Address(){
            return $this->belongsTo('App\Model\Address','dia_diem_id','thanhpho_id');
        }
    }
