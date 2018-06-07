<?php

    namespace App\Http\Controllers\Timviec;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use Illuminate\Support\Facades\Validator;
    use App\Model\Timviec\TimviecCv;
    use App\Model\Timviec\Ungtuyen;
    use App\Model\Tuyendung\TuyendungJob;
    use App\Model\Tuyendung\ThongtinTuyendung;
    use App\Model\Timviec\ThongtinTimviec;
    use App\Employer;
    use Mail;

    class TimviecHomeController extends Controller
    {

        //
        public function home()
        {
            return view('timviec.index');
        }

        public function kiemtracv(Request $request)
        {
            $cv = TimviecCv::where('user_id', Auth::user()->id)->get();
            if ($cv->isEmpty() == true) {
                return response()->json([
                    'error' => true,
                    'message' => 'chua co cv'
                ], 200);
            } else {
                return response()->json([
                    'error' => false,
                    'message' => 'success'
                ], 200);
            }
        }

        public function save_jops(Request $request)
        {
            $jop_id = $request['jop_id'];
            $user_id = $request['user_id'];
            $jop = TuyendungJob::find($jop_id);
            $save = array($user_id);
            $jop->jop_save()->attach($save);

//            xử lý gửi mail thông báo tới nhà tuyển dụng
//bước 1 lấy công việc được lưu
            $tuyendung_id = $jop->employer_id;
            $thongtincongtyquantam = ThongtinTimviec::findOrFail($user_id);
            $tencongtyquantam = $thongtincongtyquantam->ten_doanh_nghiep;
            $thongtin_id_timviec = $thongtincongtyquantam->id;
            $mangdulieu = array(
                'job_name' => $jop->ten_cong_viec,
                'ten_cong_ty' => $tencongtyquantam,
                'thongtin_id_timviec' => $thongtin_id_timviec, //id thông tin user
                'id_tuyendung'=>$tuyendung_id
            );
            $tuyendung = Employer::findOrFail($tuyendung_id);
            $mail_td = $tuyendung->email;
            Mail::send('mail.savejob', $mangdulieu, function ($message) use ($mail_td) {
                $message
                    ->to($mail_td, 'Visitor')
                    ->subject('Job Stock: Ứng viên quan tâm công việc của bạn');
            });
            return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);

        }

        public function ungtuyen($id)
        {
            $jop = TuyendungJob::find($id);
            $thongtin = ThongtinTuyendung::where('employer_id', $jop->employer_id)->first();
            $cv = TimviecCv::where('user_id', Auth::user()->id)->get();
            return view('search.ung-tuyen', ['jop' => $jop, 'cv' => $cv, 'thongtin' => $thongtin]);
        }

        public function guicv(Request $request)
        {
            $job_id = $request->job_id;
            $rules = [
                'filedinhkem' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('timviec.ungtuyen', $job_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $job_id = $request->job_id;
                $cv_id = $request->cv_id;
                if ($request->hasFile('filedinhkem')) {
                    $attach = $request->file('filedinhkem');
                    $attach_name = time() . $attach->getClientOriginalName();
                    $attach_name = $attach->move('upload\attach\ungtuyen', $attach_name);
                }
                $model = new Ungtuyen();
                $model->timviec_cv_id = $cv_id;
                $model->tuyendung_job_id = $job_id;
                $model->file_dinh_kem = $attach_name;
                $model->save();

//                bắt đầu gửi mail
                $congviecduocungtuyen = TuyendungJob::findOrFail($job_id);
                $tuyendung_id = $congviecduocungtuyen->employer_id;
                $user_tuyendung = Employer::findOrFail($tuyendung_id);
                $mail_td = $user_tuyendung->email;
                $tencongviec = $congviecduocungtuyen->ten_cong_viec;
                $mangdulieu = array(
                    'tencongviec' => $tencongviec,
                    'id_congviec' =>$job_id
                );
                Mail::send('mail.mail_ung_tuyen', $mangdulieu, function ($message) use ($mail_td) {
                    $message
                        ->to($mail_td, 'Visitor')
                        ->subject('Job Stock: Bạn có ứng viên ứng tuyển vào công việc');
                });
                return redirect(route('timviec.index'));
            }
        }
    }
