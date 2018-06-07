<?php

    namespace App\Http\Controllers\Tuyendung;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Employer;
    use App\Model\Timviec\ThongtinTimviec;
    use App\Model\Tuyendung\ThongtinTuyendung;
    use Auth;
    use App\User;
    use Mail;

    class TuyendungLuuCongtyController extends Controller
    {
        //
        public function luucongty(Request $request)
        {

            $id_thongtin = $request['id_thongtin'];
            $nhatuyendung = Employer::find(Auth::user()->id);
            $save = array($id_thongtin);
            $nhatuyendung->luucongty()->attach($save);
//            lấy thông tin để gửi mail cho người được quan tâm
            $thongtin = ThongtinTuyendung::findOrfail(Auth::user()->id);
            $ten_cong_ty = $thongtin->ten_doanh_nghiep;
            $id_employer = $thongtin->employer_id;
            $laymaidegui = ThongtinTimviec::findOrFail($id_thongtin);
            $user_id = $laymaidegui->user_id;
            $user = User::find($user_id);
            $mail_tv = $user->email;
            $mangdulieu = array(
                'id_employer' => $id_employer,
                'ten_cong_ty' => $ten_cong_ty,
            );
            Mail::send('mail.tuyendung_luu_congty', $mangdulieu, function ($message) use ($mail_tv) {
                $message
                    ->to($mail_tv, 'Visitor')
                    ->subject('Job Stock: Có công ty quan tâm hồ sơ của bạn');
            });
        }
    }
