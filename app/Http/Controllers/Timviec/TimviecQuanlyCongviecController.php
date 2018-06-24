<?php

    namespace App\Http\Controllers\Timviec;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use App\Model\Timviec\TimviecCv;
    use App\Model\Tuyendung\TuyendungJob;
    use App\Model\Timviec\TimviecUngtuyen;
    use App\User;

    class TimviecQuanlyCongviecController extends Controller
    {
        //danh sách công việc đã ứng tuyển
        public function dangungtuyen()
        {
            $all_cv = TimviecCv::where('user_id', Auth::user()->id)->get();
            $all_job = array();
            foreach ($all_cv as $cv) {
                $jop = TimviecUngtuyen::where('timviec_cv_id', $cv->id)->get();
                array_push($all_job, $jop);
            }
            if (isset($all_job)) {
                $toanbojobungtuyen = array();
                foreach ($all_job as $value) {
                    foreach ($value as $a) {
                        $jobchuan = TuyendungJob::findOrFail($a->tuyendung_job_id);

                        if($jobchuan->thoi_gian_bao_gia >= date('Y-m-d')){
                            array_push($toanbojobungtuyen, $jobchuan);
                        }
                        else{
                        }
                    }
                }
                return view('timviec.quanlycongviec.dangungtuyen', ['jobs' => $toanbojobungtuyen]);
            }

        }

//    danh sách công việc đã lưu
        public function daluu()
        {
            $user = User::findOrFail(Auth::user()->id);
            $daluu = $user->save_jop;
            return view('timviec.quanlycongviec.daluu', ['jobs' => $daluu]);
        }

        public function trungtuyen()
        {
            $all_cv = TimviecCv::where('user_id', Auth::user()->id)->get();
            $all_job = array();
            foreach ($all_cv as $cv) {
                $jop = TimviecUngtuyen::where('timviec_cv_id', $cv->id)->where('status',1)->get();
                array_push($all_job, $jop);
            }
//            dd($all_job);
            if (isset($all_job)) {
                $toanbojobungtuyen = array();
                foreach ($all_job as $value) {
                    foreach ($value as $a) {
                        $jobchuan = TuyendungJob::findOrFail($a->tuyendung_job_id);
                        array_push($toanbojobungtuyen, $jobchuan);
                    }
                }
                return view('timviec.quanlycongviec.datrungtuyen', ['jobs' => $toanbojobungtuyen]);
            }
        }

        public function khongtrungtuyen()
        {
            $all_cv = TimviecCv::where('user_id', Auth::user()->id)->get();
            $all_job = array();
            foreach ($all_cv as $cv) {
                $jop = TimviecUngtuyen::where('timviec_cv_id', $cv->id)->where('status',2)->get();
                array_push($all_job, $jop);
            }
//            dd($all_job);
            if (isset($all_job)) {
                $toanbojobungtuyen = array();
                foreach ($all_job as $value) {
                    foreach ($value as $a) {
                        $jobchuan = TuyendungJob::findOrFail($a->tuyendung_job_id);
                        array_push($toanbojobungtuyen, $jobchuan);
                    }
                }
                return view('timviec.quanlycongviec.datrungtuyen', ['jobs' => $toanbojobungtuyen]);
            }
        }
    }
