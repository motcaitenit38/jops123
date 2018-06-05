<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Model\Address;
    use Auth;
    use App\Model\Tuyendung\TuyendungJob;
    use App\Model\Tuyendung\ThongtinTuyendung;
    use App\User;
    use App\Model\Timviec\TimviecLuuJob;
    use App\Model\Timviec\Timviecungtuyen;
    use App\Model\Timviec\TimviecCv;

    class HomeController extends Controller
    {
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function home()
        {
            $address = Address::all();
            return view('index', ['address' => $address]);
        }

        public function search(Request $request)
        {
            $keywork = $request->kw;
            $tp = $request->address;
            $address = Address::all();
            if ($keywork == '') {
                $jop = TuyendungJob::where('dia_diem_uu_tien', $tp)->orderBy('id', 'desc')->paginate(10);
                return view('search.kqtk', ['jops' => $jop, 'address' => $address]);
            } else {
                $jop = TuyendungJob::where('ten_cong_viec', 'like', '%' . $keywork . '%')
                    ->where('dia_diem_uu_tien', $tp)
                    ->orderBy('id', 'desc')->paginate(10);
                return view('search.kqtk', ['jops' => $jop, 'address' => $address]);
            }
        }

        public function detail($id)
        {
            $jop = TuyendungJob::findOrFail($id);
            $nhansu = json_decode($jop->nhan_su);
            $thiethi = json_decode($jop->thiet_bi, true);
            $thongtin = ThongtinTuyendung::where('employer_id', $jop->employer_id)->first();

            if (Auth::guard('web')->check()) {
//            kiem tra da lu hay chua
                $user = User::findOrFail(Auth::user()->id);
//            lấy tất cả cv của thằng này
                $all_cv = $user->timviec_cv;
//            dd($all_cv);
                $all_job_save = $user->save_jop->toArray();
                $job_save = array();
                foreach ($all_job_save as $value) {
                    array_push($job_save, $value['id']);
                }
//            kiem tra da ung tuyen hay chua
                $abc = $jop->cvungtuyen->toArray();
                $job_ungtuyen = array();
                foreach ($abc as $value) {
                    array_push($job_ungtuyen, $value['id']);
                }

                return view('search.detail-jop', [
                    'jop' => $jop,
                    'thongtin' => $thongtin,
                    'b' => $thiethi,
                    'nhansu' => $nhansu,
                    'jop_save' => $job_save,
                    'job_ungtuyen' => $job_ungtuyen,
                    'all_cv' => $all_cv
                ]);
            }
            return view('search.detail-jop', [
                'jop' => $jop,
                'thongtin' => $thongtin,
                'b' => $thiethi,
                'nhansu' => $nhansu,
            ]);
        }
    }
