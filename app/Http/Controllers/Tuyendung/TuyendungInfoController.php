<?php

namespace App\Http\Controllers\Tuyendung;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tuyendung\InfoTuyendung;
use App\Tuyendung\Nganhnghe;
use App\Tuyendung\Info_Nganh;
use App\Tuyendung;
use App\Quymocongty;

class TuyendungInfoController extends Controller
{
    //
	public function getAdd(){
		$nganhnghe = Nganhnghe::all();
		$quymo     = Quymocongty::all();
		// dd($nganhnghe);
		return view('tuyendung.tuyendung-info.add',['nganhnghe'=>$nganhnghe, 'quymo'=>$quymo]);
	}

	public function postAdd(Request $request){
		$this->validate($request, [
			'tencongty'   => 'required|min:5',
			'quymo'       => 'required',
			'diachi'      =>  'required|min:5',
			'dienthoai'   => 'required|min:10|max:11',
			'nganhnghe'   => 'required',
			'namthanhlap' => 'required',
			'gioithieu'   => 'required|min:10'                        
		], [
			'tencongty.required'   => 'Vui lòng nhập tên công ty',
			'tencongty.min'        => 'Tên công ty quá ngắn',
			'quymo.required'       => 'Vui lòng chọn quy mô công ty',
			'diachi.required'      => 'Vui lòng nhập địa chỉ công ty',
			'nganhnghe.required'   => 'Vui lòng chọn ngành nghề của công ty',
			'namthanhlap.required' => 'Vui lòng nhập năm thành lập công ty',
			'gioithieu.required'   => 'Vui lòng giới thiệu về công ty',
			'dienthoai.required'   => 'Vui lòng nhập số điện thoại của công ty',
			'dienthoai.min'        => 'Số điện thoại không đúng',
			'dienthoai.max'        => 'Số điện thoại không đúng',

		]);
		$info = new InfoTuyendung;
		$info->tencongty   = $request->tencongty;
		$info->quymo       = $request->quymo;
		$info->diachi      = $request->diachi;
		$info->dienthoai   = $request->dienthoai;
		$info->namthanhlap = $request->namthanhlap;
		$info->gioithieu   = $request->gioithieu;
		$info->avata       = 'link-avata';
		$info->idtuyendung = Auth::user()->id;
		$info->save();

		// bắt đầu xử lý chèn bảng trung gian quan hệ nhiều nhiều
		// Lấy mảng dữ liệu ngành nghề khi insert từ input 
		$nganhnghe = $request->nganhnghe; 
		$info->nganhnghe()->sync($nganhnghe);				
		// kết thúc xử lý chèn bảng trung gian
		return redirect()->route('tuyendung.thongtin', $info->id);
	}


	public function getthongtin($id){
		// echo (Auth::user()->id);
		$info = InfoTuyendung::where('idtuyendung','=',Auth::user()->id)->get();
		// foreach ($info->nganhnghe1() as $value) {
			echo $info->id->pivot->id;
		// }

		// dd($info);
		// $truong = InfoTuyendung::find($idthongtintuyendung)->nganhnghe()->get();
     	// return view('tuyendung.tuyendung-info.get', ['info'=>$info]);
	}
}
