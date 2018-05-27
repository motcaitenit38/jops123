<?php

    namespace App\Employer;

    use Illuminate\Database\Eloquent\Model;

    class Jop extends Model
    {
        //quan hệ n-n khi nộp khi người ứng tuyển
        public function jop_cv(){
            return $this->belongsToMany('App\Seeker\Seeker_cv','jop_seeker_cv');
        }

        public function jop_save(){
            return $this->belongsToMany('App\User','jop_user');
        }
//        quan hệ với bảng user tuyển dụng
        public function employer_info()
        {
            return $this->belongsTo('App\Employer\Employer_info', 'employer_id', 'employer_id');
        }

        // quan hệ n-n với ngành nghề
        public function career()
        {
            return $this->belongsToMany('App\Career', 'carrer_jop');
        }

//        quan hệ n-n với CV
        public function seeker_cv()
        {
            return $this->belongsToMany('App\Seeker\Seeker_cv', 'jop_seeker_cv');
        }

        public function address()
        {
            return $this->belongsTo('App\Address', 'address_id', 'thanhpho_id');
        }

        public function academic()
        {
            return $this->belongsTo('App\Academic_level', 'academic_level_id', 'academic_level_id');
        }

        public function experience()
        {
            return $this->belongsTo('App\Experience', 'experience_id', 'experience_id');
        }

        public function form_work()
        {
            return $this->belongsTo('App\Form_work', 'form_work_id', 'form_work_id');
        }

        public function salary_level()
        {
            return $this->belongsTo('App\Salary_level', 'salary_level_id', 'salary_level_id');
        }

        public function position()
        {
            return $this->belongsTo('App\Position', 'position_id', 'position_id');
        }

    }
