<?php

namespace App\Http\Controllers\Timviec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Nganhnghe;
use App\User;
use App\Timviec\Timviec_info;
use App\Diachi\Tinhthanhpho;
use App\Capbac;
use App\Kinhnghiem;

class Timviec_infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $danhsachhoso = Timviec_info::where('timviec_user_id', '=', Auth::user()->id)->paginate(5);
            return view('timviec.timviec-info.index', ['danhsachhosos' => $danhsachhoso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
            $nganhnghe = Nganhnghe::all();
            $thanhpho = Tinhthanhpho::all();
            $capbac = Capbac::all();
            $kinhnghiem = Kinhnghiem::all();
            return view('timviec.timviec-info.add',['nganhnghe'=>$nganhnghe,'thanhpho'=>$thanhpho, 'capbac'=>$capbac, 'kinhnghiem'=>$kinhnghiem]);
           
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
            'hoten'             => 'required',
            'tieudehoso'        => 'required',
            'dienthoai'         => 'required',
            'diadiemlamviec'    => 'required',
            'capbac'            => 'required',
            'kinhnghiemlamviec' => 'required',
            'mucluongmongmuon'  => 'required',
            'gioithieu'         => 'required',
            'filedinhkem'       => 'required',
            ], [
            'hoten.required'             => 'Vui lòng nhập tên công ty',            
            'tieudehoso.required'        => 'Vui lòng nhập tên công ty',            
            'dienthoai.required'         => 'Vui lòng chọn quy mô công ty',
            'diadiemlamviec.required'    => 'Vui lòng nhập địa chỉ công ty',           
            'capbac.required'            => 'Vui lòng chọn ngành nghề của công ty',
            'kinhnghiemlamviec.required' => 'Vui lòng giới thiệu về công ty',
            'mucluongmongmuon.required'  => 'Vui lòng giới thiệu về công ty',            
            'gioithieu.required'         => 'Vui lòng nhập số điện thoại của công ty',
            'filedinhkem.required'       => 'Vui lòng upload ảnh đại diện',
           
        ]);
        if ($request->hasFile('filedinhkem')) {
                    $file = $request->filedinhkem;
                    $tenfile = Auth::user()->id.$file->getClientOriginalName();
                    $tenfile = $file->move('upload', $tenfile);
                }
        $info = new Timviec_info;
        $info->hoten            = $request->hoten;
        $info->tieudehoso       = $request->tieudehoso;
        $info->dienthoai        = $request->dienthoai;
        $info->diadiemlamviec   = $request->diadiemlamviec;
        $info->capbac_id        = $request->capbac;
        $info->kinhnghiem_id    = $request->kinhnghiemlamviec;
        $info->mucluongmongmuon = $request->mucluongmongmuon;
        $info->gioithieu        = $request->gioithieu;
        $info->filedinhkem      = $tenfile;
        $info->timviec_user_id = Auth::user()->id;


        $info->save();

        // bắt đầu xử lý chèn bảng trung gian quan hệ nhiều nhiều
        // Lấy mảng dữ liệu ngành nghề khi insert từ input 
        $nganhnghe = $request->nganhnghe; 
        $info->nganhnghe()->sync($nganhnghe);               
        // kết thúc xử lý chèn bảng trung gian
        // Truyền id user tuyển dụng cho route show thông tin
        // return redirect()->route('info.show', $info->id);
        return redirect()->route('info-timviec.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

            $nganhnghe = Nganhnghe::all();
            $thanhpho = Tinhthanhpho::all();
            $capbac = Capbac::all();
            $kinhnghiem = Kinhnghiem::all();
        
        
        $thongtin = Timviec_info::findOrFail($id);

        // Lấy tất cả ngành nghề của user cho vào 1 mảng và truyền sang view
        // Bên view kiểm tra key có tồn tại hay không để in ra.
        $nganhnghe_user = array();
        foreach($thongtin->nganhnghe()->get() as $value) {
            $nganhnghe_user[$value->id] = $value->tennganh;
        }

        return view('timviec.timviec-info.edit',['thongtin'=>$thongtin, 'nganhnghe'=>$nganhnghe, 'nganhnghe_user'=>$nganhnghe_user, 'thanhpho'=>$thanhpho, 'capbac'=>$capbac,'kinhnghiem'=>$kinhnghiem]);
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
            'hoten'             => 'required',
            'tieudehoso'        => 'required',
            'dienthoai'         => 'required',
            'diadiemlamviec'    => 'required',
            'capbac'            => 'required',
            'kinhnghiemlamviec' => 'required',
            'mucluongmongmuon'  => 'required',
            'gioithieu'         => 'required',
            ], [
            'hoten.required'             => 'Vui lòng nhập tên công ty',            
            'tieudehoso.required'        => 'Vui lòng nhập tên công ty',            
            'dienthoai.required'         => 'Vui lòng chọn quy mô công ty',
            'diadiemlamviec.required'    => 'Vui lòng nhập địa chỉ công ty',           
            'capbac.required'            => 'Vui lòng chọn ngành nghề của công ty',
            'kinhnghiemlamviec.required' => 'Vui lòng giới thiệu về công ty',
            'mucluongmongmuon.required'  => 'Vui lòng giới thiệu về công ty',            
            'gioithieu.required'         => 'Vui lòng nhập số điện thoại của công ty',
           
        ]);
         if ($request->hasFile('filedinhkem')) {
        $file    = $request->filedinhkem;
        $tenfile = Auth::user()->id.$file->getClientOriginalName();
        $tenfile = $file->move('upload', $tenfile);
        $info    = Timviec_info::find($id);
        $info->hoten            = $request->hoten;
        $info->tieudehoso       = $request->tieudehoso;
        $info->dienthoai        = $request->dienthoai;
        $info->diadiemlamviec   = $request->diadiemlamviec;
        $info->capbac_id        = $request->capbac;
        $info->kinhnghiem_id    = $request->kinhnghiemlamviec;
        $info->mucluongmongmuon = $request->mucluongmongmuon;
        $info->gioithieu        = $request->gioithieu;
        $info->filedinhkem      = $tenfile;
        $info->timviec_user_id = Auth::user()->id;

        }else{ 
        $info = Timviec_info::find($id);
        $info->hoten            = $request->hoten;
        $info->tieudehoso       = $request->tieudehoso;
        $info->dienthoai        = $request->dienthoai;
        $info->diadiemlamviec   = $request->diadiemlamviec;
        $info->capbac_id        = $request->capbac;
        $info->kinhnghiem_id    = $request->kinhnghiemlamviec;
        $info->mucluongmongmuon = $request->mucluongmongmuon;
        $info->gioithieu        = $request->gioithieu;
        $info->timviec_user_id = Auth::user()->id;

        }
       


        $info->save();

        // bắt đầu xử lý chèn bảng trung gian quan hệ nhiều nhiều
        // Lấy mảng dữ liệu ngành nghề khi insert từ input 
        $nganhnghe = $request->nganhnghe; 
        $info->nganhnghe()->sync($nganhnghe);               
        // kết thúc xử lý chèn bảng trung gian
        // Truyền id user tuyển dụng cho route show thông tin
        // return redirect()->route('info.show', $info->id);
        return redirect()->route('info-timviec.index');

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
