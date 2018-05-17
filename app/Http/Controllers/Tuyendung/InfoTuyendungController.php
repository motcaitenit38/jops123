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

class InfoTuyendungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infotuyendung = InfoTuyendung::where('idtuyendung', '=', Auth::user()->id)->get()->toArray();
        // kiển tra mảng thông tin có rỗng hay không
        // nếu rỗng thì chuyển đến trang thêm mới, ngược lại chuyển đến trang chi tiết
        if (empty($infotuyendung)) {
            return redirect()->route('info.create');
        }
        else {
            $infotuyendung = InfoTuyendung::where('idtuyendung', '=', Auth::user()->id)->get();

            // dd($infotuyendung);
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
        $infotuyendung = InfoTuyendung::where('idtuyendung', '=', Auth::user()->id)->get()->toArray();
        // kiển tra mảng thông tin có rỗng hay không
        // nếu rỗng thì chuyển đến trang thêm mới, ngược lại chuyển đến trang chi tiết
        if (empty($infotuyendung)) {
            $nganhnghe = Nganhnghe::all();
            $quymo     = Quymocongty::all();
            return view('tuyendung.tuyendung-info.add',['nganhnghe'=>$nganhnghe, 'quymo'=>$quymo, 'alert' => 'danger', 'thongbao' => 'Bạn chưa hoàn thành hồ sơ, vui lòng hoàn thành hồ sơ trước']);
            }
        else {
            $infotuyendung = InfoTuyendung::where('idtuyendung', '=', Auth::user()->id)->get();
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
        $info->idquymo     = $request->quymo;
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
        // Truyền id user tuyển dụng cho route show thông tin
        // return redirect()->route('info.show', $info->id);
        return redirect()->route('info.show', $info->idtuyendung);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infotuyendung = InfoTuyendung::where('idtuyendung', '=', $id)->get();
        // echo $id;
        // dd($infotuyendung);
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
        // echo $id;
        $nganhnghe = Nganhnghe::all();
        // dd($nganhnghe);
        
        $quymo     = Quymocongty::all();
        
        
        $thongtin = InfoTuyendung::findOrFail($id);

        // Lấy tất cả ngành nghề của user cho vào 1 mảng và truyền sang view
        // Bên view kiểm tra key có tồn tại hay không để in ra.
        $nganhnghe_user = array();
        foreach($thongtin->nganhnghe()->get() as $value) {
            $nganhnghe_user[$value->id] = $value->tennganh;
        }

        return view('tuyendung.tuyendung-info.edit',['thongtin'=>$thongtin, 'quymo'=>$quymo, 'nganhnghe'=>$nganhnghe, 'nganhnghe_user'=>$nganhnghe_user]);
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
            'diachi.min'           => 'Vui lòng nhập địa chỉ chính xác',
            'nganhnghe.required'   => 'Vui lòng chọn ngành nghề của công ty',
            'namthanhlap.required' => 'Vui lòng nhập năm thành lập công ty',
            'gioithieu.required'   => 'Vui lòng giới thiệu về công ty',
            'dienthoai.required'   => 'Vui lòng nhập số điện thoại của công ty',
            'dienthoai.min'        => 'Số điện thoại không đúng',
            'dienthoai.max'        => 'Số điện thoại không đúng',

        ]);
        // $request->flash();
        $info = InfoTuyendung::findOrFail($id);
        $info->tencongty   = $request->tencongty;
        $info->idquymo     = $request->quymo;
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
        // Truyền id user tuyển dụng cho route show thông tin
        return redirect()->route('info.show', $info->idtuyendung);

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
