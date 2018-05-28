<?php

    namespace App\Http\Controllers\Seeker;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Seeker\Seeker_cv;
    use App\Employer\Jop;
    use App\Career;
    use Auth;

    class Accordant_Jop_Controller extends Controller
    {
        //
        public function index()
        {
//            Lấy tất cả CV của thằng đang đăng nhập
            $cv = Seeker_cv::where('user_id', Auth::user()->id)->get();
            $jop_lienquan = array();
//            foreach cv để lấy tất cả ngành nghề có trong cv
            foreach ($cv as $nn) {
//                Lấy tất cả ngành nghề mà cv đó có
                $nn = Career::where('id', $nn->career_id)->get();
//                foreach ngành nghề để lấy id của ngành nghề
                foreach ($nn as $a) {
//                    dùng quan hệ n-n để lấy tất cả các công việc
                    $b = $a->jop;
//                    foreach tất cả công việc để đưa vào mảng
                    foreach ($b as $c) {
                        array_push($jop_lienquan, $c);
                    }
                }
            }
            return view('seeker.seeker-jop.jop-phu-hop', ['congviec' => $jop_lienquan]);
        }
    }
