<?php

    namespace App\Http\Controllers\Seeker;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Employer\Jop;
    use Auth;
    use App\User;
    use App\Employer;
    use App\Seeker\Seeker_cv;

    class Seeker_jop_Controller extends Controller
    {
        //
        public function ungtuyen()
        {
            $user = User::find(Auth::user()->id);
            $cvs = $user->seeker_cv;
            $congviec = array();
            foreach ($cvs as $item) {
                foreach ($item->cv_jop as $value) {
//                    thêm dữ liệu vào mảng sau khi duyệt
                    array_push($congviec, $value);
                }
            }
            return view('seeker.seeker-jop.da-ung-tuyen', ['congviec' => $congviec]);
        }

        public function daluu()
        {
            $user = User::find(Auth::user()->id);
            $congviec = $user->save_jop;
            return view('seeker.seeker-jop.da-luu', ['congviec' => $congviec]);
        }
    }
