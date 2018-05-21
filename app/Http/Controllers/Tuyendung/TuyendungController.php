<?php

namespace App\Http\Controllers\Tuyendung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tuyendung\Tuyendung_info;
use App\Tuyendung\Tuyendung_user;
use App\Nganhnghe;
use App\Diachi\Tinhthanhpho;
use Auth;

class TuyendungController extends Controller
{
    //
    public function home(){
    	$infotuyendung = Tuyendung_info::where('tuyendung_id', '=', Auth::user()->id)->get()->toArray();
        // kiển tra mảng thông tin có rỗng hay không
        // nếu rỗng thì chuyển đến trang thêm mới, ngược lại chuyển đến trang chi tiết
        if (empty($infotuyendung)) {
            $nganhnghe = Nganhnghe::all();
            $thanhpho  = Tinhthanhpho::all();
            return view('tuyendung.tuyendung-info.add',['nganhnghe'=>$nganhnghe, 'thanhpho'=>$thanhpho, 'alert' => 'danger', 'thongbao' => 'Bạn chưa hoàn thành hồ sơ, vui lòng hoàn thành hồ sơ trước']);
        }
        else {
            return view('tuyendung.home');
        }
    }

}
