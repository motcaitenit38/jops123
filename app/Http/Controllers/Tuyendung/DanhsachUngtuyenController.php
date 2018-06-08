<?php

    namespace App\Http\Controllers\Tuyendung;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Model\Timviec\TimviecUngtuyen;
    use App\Model\Timviec\TimviecCv;
    use Auth;
    use App\Model\Timviec\ThongtinTimviec;
    use App\Model\Tuyendung\TuyendungJob;
    use App\User;
    use App\Model\Tuyendung\ThongtinTuyendung;
    use Mail;

    class DanhsachUngtuyenController extends Controller
    {
        //
        public function danhsach($id)
        {
            $ungvien = TimviecUngtuyen::where('tuyendung_job_id', $id)->get();
            $all_cv_ungtuyen = array();
            $thongtin_ct = array();
            $allcv_ungtuyen_id = array();
            foreach ($ungvien as $cv) {
                $cv_ungtuyen = $cv->timviec_cv_id;
                array_push($allcv_ungtuyen_id, $cv_ungtuyen);

                $cv = TimviecCv::findOrFail($cv->timviec_cv_id);
                array_push($all_cv_ungtuyen, $cv);
//                xử lý lấy thông tin
                $thongtin = ThongtinTimviec::where('user_id', $cv->user_id)->first();
                array_push($thongtin_ct, $thongtin);
            }

            $truong = array();
            foreach ($allcv_ungtuyen_id as $cv_id) {
                $model = TimviecUngtuyen::where('timviec_cv_id', $cv_id)->where('tuyendung_job_id',
                    $id)->where('status',1)->first();
                if(!empty($model['timviec_cv_id'])){
                    array_push($truong, $model['timviec_cv_id']);
                }else{
                }
            }
            $sophantu = count($all_cv_ungtuyen);
            return view('tuyendung.ungvien.danhsach',
                [
                    'danhsach' => $all_cv_ungtuyen,
                    'thongtin' => $thongtin_ct,
                    'id_job' => $id,
                    'soluong' => $sophantu,
                    'truong'  => $truong
                ]);
        }

        public function chitiethoso($idcv, $idjob)
        {

            $cv = TimviecCv::findOrFail($idcv);
            $nhansu = json_decode($cv->nhan_su);
            $thietbi = json_decode($cv->thiet_bi, true);
            $file = TimviecUngtuyen::where('timviec_cv_id', $idcv)->where('tuyendung_job_id', $idjob)->first();

            $thongtin = ThongtinTimviec::where('user_id',$cv->user_id)->first();
            return view('tuyendung.ungvien.chitiet',
                ['cv' => $cv, 'thongtin' => $thongtin, 'file' => $file, 'b' => $thietbi, 'nhansu' => $nhansu]);
        }

        public function chapnhanungvien(Request $request)
        {
            $cv_id = $request['cv_id'];
            $job_id = $request['job_id'];
            $model_xit = TimviecUngtuyen::where('tuyendung_job_id', $job_id)->get();
            foreach ($model_xit as $value) {
                $value->status = 2;
                $value->save();
            }
            $model = TimviecUngtuyen::where('timviec_cv_id', $cv_id)->where('tuyendung_job_id', $job_id)->first();
            $model->status = 1;
            $model->save();
//            xử lý gửi mail sau khi chấp nhận ứng viên
            $user_cv = TimviecCv::findOrFail($cv_id);
            $user_email = User::findOrFail($user_cv->user_id);
            $job = TuyendungJob::findOrFail($job_id);
            $thongtin_tuyendung = ThongtinTuyendung::where('employer_id',$job->employer_id)->first();
            $mangdulieu = array(
                'job_name' => $job->ten_cong_viec,
                'job_id' => $job->id,
                'cv_name' => $user_cv->ten_cv,
                'tuyendung_name' => $thongtin_tuyendung->ten_doanh_nghiep,
            );
            $mail_nhan = $user_email->email;
            Mail::send('mail.chapnhanungvien', $mangdulieu, function ($message) use ($mail_nhan) {
                $message->to($mail_nhan, 'Visitor')->subject('Job Stock: Hồ sơ của bạn đã được chấp nhận!');
            });
        }

    }
