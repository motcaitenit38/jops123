<?php

    namespace App\Seeker;

    use Illuminate\Database\Eloquent\Model;

    class Seeker_cv extends Model
    {
        // quan hệ n-n khi nộp cv vào 1 công việc
        public function cv_jop()
        {
            return $this->belongsToMany('App\Employer\Jop', 'jop_seeker_cv')->orderBy('id');
        }
//        Quan hệ 1cv có 1 ngành nghề
        public function career(){
            return $this->belongsTo('App\Career','career_id','id');
        }
//        quan hệ 1 cv thuộc một user tìm việc
        public function user_seeker(){
            return $this->belongsTo('App\User','user_id','id');
        }

        public function address(){
            return $this->belongsTo('App\Address','address_id','thanhpho_id');
        }

        public function form_work()
        {
            return $this->belongsTo('App\Form_work', 'form_work_id', 'form_work_id');
        }

        public function position()
        {
            return $this->belongsTo('App\Position', 'position_id', 'position_id');
        }

        public function academic()
        {
            return $this->belongsTo('App\Academic_level', 'academic_level_id', 'academic_level_id');
        }
        public function experience()
        {
            return $this->belongsTo('App\Experience', 'experience_id', 'experience_id');
        }

    }
