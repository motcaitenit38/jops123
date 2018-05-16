<?php

namespace App\Http\Controllers\Tuyendung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tuyendung\InfoTuyendung;
use App\Nganhnghe;
use App\Tuyendung\Info_Nganh;
use App\Tuyendung;
use App\Quymocongty;
use Auth;

class TuyendungController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:tuyendung');
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infotuyendung = InfoTuyendung::where('idtuyendung', '=', Auth::user()->id)->get()->toArray();
        // kiển tra mảng thông tin có rỗng hay không
        // nếu rỗng thì chuyển đến trang thêm mới, ngược lại chuyển đến trang chi tiết
        if (empty($infotuyendung)) {
            $nganhnghe = Nganhnghe::all();
            $quymo     = Quymocongty::all();
            return view('tuyendung.tuyendung-info.add',['nganhnghe'=>$nganhnghe, 'quymo'=>$quymo, 'alert' => 'danger', 'thongbao' => 'Bạn chưa hoàn thành hồ sơ, vui lòng hoàn thành hồ sơ trước']);
        }
        else {
            // return redirect()->route('index');
            return view('tuyendung.home');
        }
    }
}
