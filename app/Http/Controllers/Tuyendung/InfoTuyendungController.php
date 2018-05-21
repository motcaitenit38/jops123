<?php

namespace App\Http\Controllers\Tuyendung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tuyendung\Tuyendung_info;
use App\Nganhnghe;
use App\Tuyendung\Tuyendung_info_Nganh;
use App\Tuyendung_user;
use Auth;
use App\Diachi\Tinhthanhpho;

class InfoTuyendungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infotuyendung = Tuyendung_info::where('tuyendung_id', '=', Auth::user()->id)->get()->toArray();
        // kiển tra mảng thông tin có rỗng hay không
        // nếu rỗng thì chuyển đến trang thêm mới, ngược lại chuyển đến trang chi tiết
        if (empty($infotuyendung)) {
            return redirect()->route('info.create');
        }
        else {
            $infotuyendung = Tuyendung_info::where('tuyendung_id', '=', Auth::user()->id)->first();
            return view('tuyendung.tuyendung-info.get', ['info' => $infotuyendung]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infotuyendung = Tuyendung_info::where('tuyendung_id', '=', Auth::user()->id)->get()->toArray();
        // kiển tra mảng thông tin có rỗng hay không
        // nếu rỗng thì chuyển đến trang thêm mới, ngược lại chuyển đến trang chi tiết
        if (empty($infotuyendung)) {
            $nganhnghe = Nganhnghe::all();
            $thanhpho  = Tinhthanhpho::all();
            return view('tuyendung.tuyendung-info.add',['nganhnghe'=>$nganhnghe, 'thanhpho'=>$thanhpho]);
            }
        else {
            $infotuyendung = Tuyendung_info::where('tuyendung_id', '=', Auth::user()->id)->first();
            return view('tuyendung.tuyendung-info.get', ['info' => $infotuyendung]);
        }
    }
       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'tencongty'   => 'required|min:5',
            'diachi_tp'   => 'required',
            'diachicuthe' => 'required|min:5',
            'dienthoai'   => 'required|min:10|max:11',            
            'website'     => 'required|min:6',
            'nganhnghe'   => 'required',
            'gioithieu'   => 'required|min:10',
            'avata'       => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ], [
            'tencongty.required'   => 'Vui lòng nhập tên công ty',
            'tencongty.min'        => 'Tên công ty quá ngắn',
            'diachi_tp.required'   =>'Vui lòng chọn địa chỉ',
            'diachicuthe.required' => 'Vui lòng nhập địa chỉ công ty',
            'diachicuthe.min'      => 'Vui lòng nhập địa chỉ chính xác',
            'dienthoai.required'   => 'Vui lòng nhập số điện thoại của công ty',
            'dienthoai.min'        => 'Số điện thoại không đúng',
            'dienthoai.max'        => 'Số điện thoại không đúng',
            'website.required'     => 'Vui lòng giới thiệu về công ty',
            'website.min'          => 'Vui lòng giới thiệu về công ty',
            'nganhnghe.required'   => 'Vui lòng chọn ngành nghề của công ty',
            'gioithieu.required'   => 'Vui lòng giới thiệu về công ty',            
            'gioithieu.min'        => 'Vui lòng giới thiệu về công ty',
            'avata.required'       =>'Vui lòng upload ảnh đại diện',
            'avata.image'          =>'File ảnh không đúng định dạng',
            'avata.max'            =>'File ảnh có dung lượng quá lớn',
        ]);
        if ($request->hasFile('avata')) {
                    $file = $request->avata;
                    $tenfile = Auth::user()->id.$file->getClientOriginalName();
                    $tenfile = $file->move('upload', $tenfile);
            }
        $info = new Tuyendung_info;
        $info->tencongty = $request->tencongty;
        $info->diachi_tp = $request->diachi_tp;
        $info->diachicuthe    = $request->diachicuthe;
        $info->dienthoai = $request->dienthoai;
        $info->website   = $request->website;
        $info->gioithieu = $request->gioithieu;
        $info->avata     = $tenfile;
        $info->tuyendung_id = Auth::user()->id;


        $info->save();

        // bắt đầu xử lý chèn bảng trung gian quan hệ nhiều nhiều
        // Lấy mảng dữ liệu ngành nghề khi insert từ input 
        $nganhnghe = $request->nganhnghe; 
        $info->nganhnghe()->sync($nganhnghe);               
        // kết thúc xử lý chèn bảng trung gian
        // Truyền id user tuyển dụng cho route show thông tin
        return redirect()->route('info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infotuyendung = Tuyendung_info::where('tuyendung_id', '=', $id)->first();
        return view('tuyendung.tuyendung-info.get', ['info' => $infotuyendung, 'alert' => 'success', 'thongbao' => 'Cập nhật hồ sơ hành công']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nganhnghe = Nganhnghe::all();
        $thongtin = Tuyendung_info::findOrFail($id);
        $diadiem_tp = Tinhthanhpho::all();
        // Lấy tất cả ngành nghề của user cho vào 1 mảng và truyền sang view
        // Bên view kiểm tra key có tồn tại hay không để in ra.
        $nganhnghe_user = array();
        foreach($thongtin->nganhnghe()->get() as $value) {
            $nganhnghe_user[$value->id] = $value->tennganh;
        }

        return view('tuyendung.tuyendung-info.edit',['thongtin'=>$thongtin,'nganhnghe'=>$nganhnghe, 'nganhnghe_user'=>$nganhnghe_user, 'diadiem_tp'=>$diadiem_tp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'tencongty'   => 'required|min:5',
            'diachi_tp'   => 'required',
            'diachicuthe' => 'required|min:5',
            'dienthoai'   => 'required|min:10|max:11',            
            'website'     => 'required|min:6',
            'nganhnghe'   => 'required',
            'gioithieu'   => 'required|min:10',
            'avata'       => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ], [
            'tencongty.required'   => 'Vui lòng nhập tên công ty',
            'tencongty.min'        => 'Tên công ty quá ngắn',
            'diachi_tp.required'   =>'Vui lòng chọn địa chỉ',
            'diachicuthe.required' => 'Vui lòng nhập địa chỉ công ty',
            'diachicuthe.min'      => 'Vui lòng nhập địa chỉ chính xác',
            'dienthoai.required'   => 'Vui lòng nhập số điện thoại của công ty',
            'dienthoai.min'        => 'Số điện thoại không đúng',
            'dienthoai.max'        => 'Số điện thoại không đúng',
            'website.required'     => 'Vui lòng giới thiệu về công ty',
            'website.min'          => 'Vui lòng giới thiệu về công ty',
            'nganhnghe.required'   => 'Vui lòng chọn ngành nghề của công ty',
            'gioithieu.required'   => 'Vui lòng giới thiệu về công ty',            
            'gioithieu.min'        => 'Vui lòng giới thiệu về công ty',
            'avata.image'          =>'File ảnh không đúng định dạng',
            'avata.max'            =>'File ảnh có dung lượng quá lớn',
        ]);
        if ($request->hasFile('avata')) {
            $file = $request->avata;
            $tenfile = Auth::user()->id.$file->getClientOriginalName();
            $tenfile = $file->move('upload', $tenfile);

            $info = Tuyendung_info::findOrFail($id);
            $info->tencongty = $request->tencongty;
            $info->diachi_tp = $request->diachi_tp;
            $info->diachicuthe    = $request->diachicuthe;
            $info->dienthoai = $request->dienthoai;
            $info->website   = $request->website;
            $info->gioithieu = $request->gioithieu;
            $info->avata     = $tenfile;
            $info->tuyendung_id = Auth::user()->id;

            }else{
                $info = Tuyendung_info::findOrFail($id);
                $info->tencongty = $request->tencongty;
                $info->diachi_tp = $request->diachi_tp;
                $info->diachicuthe    = $request->diachicuthe;
                $info->dienthoai = $request->dienthoai;
                $info->website   = $request->website;
                $info->gioithieu = $request->gioithieu;       
                $info->tuyendung_id = Auth::user()->id;
            }
        $info->save();

        // bắt đầu xử lý chèn bảng trung gian quan hệ nhiều nhiều
        // Lấy mảng dữ liệu ngành nghề khi insert từ input 
        $nganhnghe = $request->nganhnghe; 
        $info->nganhnghe()->sync($nganhnghe);               
        // kết thúc xử lý chèn bảng trung gian
        // Truyền id user tuyển dụng cho route show thông tin
        return redirect()->route('info.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
