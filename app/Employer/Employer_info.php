<?php

    namespace App\Employer;

    use Illuminate\Database\Eloquent\Model;

    class Employer_info extends Model
    {
        //
        protected $table = 'employer_infos';

        // quan hệ 1-1 với tài khoản tuyển dụng (1 hồ sơ thuộc 1 công ty)
        public function employer()
        {
            return $this->belongsTo('App\Employer', 'employer_id', 'id');
        }

        public function address_info()
        {
            return $this->belongsTo('App\Address','address','thanhpho_id');
        }
    }
