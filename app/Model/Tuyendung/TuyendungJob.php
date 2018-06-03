<?php

    namespace App\Model\Tuyendung;

    use Illuminate\Database\Eloquent\Model;

    class TuyendungJob extends Model
    {
        //
        protected $fillable = [
            'ten_cong_viec',
            'gia_tri_cong_viec',
            'thoi_gian_bao_gia',
            'thoi_gian_thuc_hien',
            'dia_diem_uu_tien',
            'von_dieu_le',
            'so_nam_kinh_nghiem',
            'loai_hinh_doanh_nghiep',
            'nhan_su',
            'thiet_bi',
            'chi_tiet_cong_viec',
            'yeu_cau_cong_viec',
            'phuc_loi_cong_viec',
            'yeu_cau_ho_so_dinh_kem',
            'attach_spec',
            'attach_boq',
            'attach_ban_ve_ket_cau',
        ];

        public function job_nganh()
        {
            return $this->belongsToMany('App\Model\Nganh', 'nganh_tuyendung_jobs');
        }

        public function tuyendung()
        {
            return $this->belongsTo('App\Employer', 'employer_id','id');
        }
        public function diadiem(){
            return $this->belongsTo('App\Model\Address','dia_diem_uu_tien','thanhpho_id');
        }
    }
