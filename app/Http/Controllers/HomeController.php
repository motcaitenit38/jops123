<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Model\Address;
    use Auth;
    use App\Model\Tuyendung\TuyendungJob;
    use App\Model\Tuyendung\ThongtinTuyendung;
    use App\User;
    use App\Model\Timviec\TimviecLuuJob;
    use App\Model\Timviec\TimviecUngtuyen;
    use App\Model\Timviec\TimviecCv;
    use App\Model\Nganh;

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
                $all_job_save = $user->save_jop->toArray();
                $job_save = array();
                foreach ($all_job_save as $value) {
                    array_push($job_save, $value['id']);
                }
//                dd($job_save);

//            kiem tra da ung tuyen hay chua
//                Bước 1: Lấy tất cả cv của thằng tìm việc đang đăng nhập
                $all_cv = $user->timviec_cv->toArray();
//                Đưa toàn bộ cv vào 1 mảng, mảng đó chứa id thôi
                $cv = array();
                foreach ($all_cv as $value) {
                    array_push($cv, $value['id']);
                }
//Kết thúc lấy cv

//                lấy toàn bộ công việc đã ứng tuyển
                $all_ungtuyen = TimviecUngtuyen::all()->toArray();
                $job_ungtuyen_cv = array();
                foreach ($all_ungtuyen as $value) {
                    $job_ungtuyen_cv[$value['tuyendung_job_id']] =  $value['timviec_cv_id'];
                }
//                foreach cv ra để kiểm tra có trong mảng

                foreach ($all_cv as $value){
                    if(in_array($value['id'], $job_ungtuyen_cv) && array_key_exists($id,$job_ungtuyen_cv) ){
                        $kq = '1';
                    }
                }
                if(isset($kq)){
                    $kq='1';
                }else{
                    $kq='0';
                }
                return view('search.detail-jop', [
                    'jop' => $jop,
                    'thongtin' => $thongtin,
                    'b' => $thiethi,
                    'nhansu' => $nhansu,
                    'jop_save' => $job_save,
                    'dmcheck' => $kq,
                ]);
            }
            return view('search.detail-jop', [
                'jop' => $jop,
                'thongtin' => $thongtin,
                'b' => $thiethi,
                'nhansu' => $nhansu,
            ]);
        }

        public function getNganh($idLinhvuc)
        {
            $nganh = Nganh::where('linh_vuc_id', $idLinhvuc)->get();
            foreach ($nganh as $value) {
                echo "<option value='" . $value->id . "'>" . $value->ten_nganh . "</option>";
            }
        }
    }
