<?php

namespace App\Http\Controllers\Tuyendung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Nganhnghe;
use App\Diachi\Tinhthanhpho;
use App\Tuyendung\Tuyendung_post;
use App\Capbac;
use App\Kinhnghiem;
use App\Mucluong;

class Tuyendung_postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachbaidang = Tuyendung_post::where('tuyendung_user_id', Auth::user()->id)->where('time_nophoso','>',date('Y-m-d'))->orderBy('id','desc')->paginate(10);
        return view('tuyendung.post.get',['danhsachbaidang'=>$danhsachbaidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $thanhpho = Tinhthanhpho::all();
        $nganhnghe = Nganhnghe::all();
        $capbac = Capbac::all();
        $kinhnghiem = Kinhnghiem::all();
        return view('tuyendung.post.add', ['nganhnghe'=>$nganhnghe, 'thanhpho'=>$thanhpho, 'capbac'=>$capbac, 'kinhnghiem'=>$kinhnghiem]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tencongviec'    => 'required',
            'thanhpho'       => 'required',
            'diachicuthe'    => 'required',                   
            'capbac'         => 'required',           
            'kinhnghiem'     => 'required',
            'mucluong_tu'    => 'required',
            'mucluong_den'   => 'required',
            'soluongtuyen'   => 'required',
            'nganhnghe'      => 'required',
            'time_nophoso'   => 'required',
            'motacongviec'   => 'required',
            'yeucaucongviec' => 'required',
            'nguoilienhe'    => 'required',
            'email'          => 'required',
        ],[
            'tencongviec'    => 'Vui lòng nhập tên công việc',
            'thanhpho'       => 'Vui lòng chọn nơi làm việc',
            'diachicuthe'    => 'Vui lòng nhập địa chỉ làm việc cụ thể',                   
            'capbac'         => 'Vui lòng chọn cấp bậc',           
            'kinhnghiem'     => 'Vui lòng chọn kinh nghiệm',
            'mucluong_tu'    => 'Vui lòng chọn mức lương tối thiếu',
            'mucluong_den'   => 'Vui lòng chọn mức lương tối đa',
            'soluongtuyen'   => 'Vui lòng nhập số lượng cần tuyển',
            'nganhnghe'      => 'Vui lòng chọn ngành nghề',
            'time_nophoso'   => 'Vui lòng chọn hạn chót nộp hồ sơ',
            'motacongviec'   => 'Vui lòng nhập mô tả công việc',
            'yeucaucongviec' => 'Vui lòng nhập yêu cầu công việc',
            'nguoilienhe'    => 'Vui lòng nhập tên người đại diện liên hệ',
            'email'          => 'Vui lòng nhập email nộp hồ sơ',
        ]);

       
        $post = new Tuyendung_post;
        $post->tuyendung_user_id = Auth::user()->id;
        $post->tencongviec       = $request->tencongviec;
        $post->noilamviec        = $request->thanhpho;
        $post->diachi            = $request->diachicuthe;
        $post->capbac_id         = $request->capbac;       
        $post->kinhnghiem_id     = $request->kinhnghiem;        
        $post->soluongtuyen      = $request->soluongtuyen;
        $post->time_nophoso      = $request->time_nophoso;
        $post->motacongviec      = $request->motacongviec;
        $post->yeucaucongviec    = $request->yeucaucongviec;
        $post->nguoilienhe       = $request->nguoilienhe;
        $post->email_nguoilienhe = $request->email;
        $post->mucluong_tu      = $request->mucluong_tu;
        $post->mucluong_den     = $request->mucluong_den;       
        
        $post->save();
        $nganhnghe = $request->nganhnghe; 
        $post->nganhnghe()->sync($nganhnghe); 
        return redirect(route('post.index'));
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
        $thanhpho           = Tinhthanhpho::all();
        $nganhnghe          = Nganhnghe::all();
        $congviec           = Tuyendung_post::find($id);
        $capbac             = Capbac::all();
        $kinhnghiem         = Kinhnghiem::all();
        $nganhnghe_congviec = array();
        foreach($congviec->nganhnghe()->get() as $value) {
            $nganhnghe_congviec[$value->id] = $value->tennganh;
        }
        return view('tuyendung.post.edit',['congviec'=>$congviec,'thanhpho'=>$thanhpho,'nganhnghe'=>$nganhnghe,'nganhnghe_congviec'=>$nganhnghe_congviec,'capbac'=>$capbac,'kinhnghiem'=>$kinhnghiem]);
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
         $this->validate($request,[
            'tencongviec'    => 'required',
            'thanhpho'       => 'required',
            'diachicuthe'    => 'required',                   
            'capbac'         => 'required',           
            'kinhnghiem'     => 'required',
            'mucluong_tu'    => 'required',
            'mucluong_den'   => 'required',
            'soluongtuyen'   => 'required',
            'nganhnghe'      => 'required',
            'time_nophoso'   => 'required',
            'motacongviec'   => 'required',
            'yeucaucongviec' => 'required',
            'nguoilienhe'    => 'required',
            'email'          => 'required',
        ],[
            'tencongviec'    => 'Vui lòng nhập tên công việc',
            'thanhpho'       => 'Vui lòng chọn nơi làm việc',
            'diachicuthe'    => 'Vui lòng nhập địa chỉ làm việc cụ thể',                   
            'capbac'         => 'Vui lòng chọn cấp bậc',           
            'kinhnghiem'     => 'Vui lòng chọn kinh nghiệm',
            'mucluong_tu'    => 'Vui lòng chọn mức lương tối thiếu',
            'mucluong_den'   => 'Vui lòng chọn mức lương tối đa',
            'soluongtuyen'   => 'Vui lòng nhập số lượng cần tuyển',
            'nganhnghe'      => 'Vui lòng chọn ngành nghề',
            'time_nophoso'   => 'Vui lòng chọn hạn chót nộp hồ sơ',
            'motacongviec'   => 'Vui lòng nhập mô tả công việc',
            'yeucaucongviec' => 'Vui lòng nhập yêu cầu công việc',
            'nguoilienhe'    => 'Vui lòng nhập tên người đại diện liên hệ',
            'email'          => 'Vui lòng nhập email nộp hồ sơ',
        ]);

        $post = Tuyendung_post::findOrFail($id);
        $post->tuyendung_user_id = Auth::user()->id;
        $post->tencongviec       = $request->tencongviec;
        $post->noilamviec        = $request->thanhpho;
        $post->diachi            = $request->diachicuthe;
        $post->capbac_id         = $request->capbac;       
        $post->kinhnghiem_id     = $request->kinhnghiem;        
        $post->soluongtuyen      = $request->soluongtuyen;
        $post->time_nophoso      = $request->time_nophoso;
        $post->motacongviec      = $request->motacongviec;
        $post->yeucaucongviec    = $request->yeucaucongviec;
        $post->nguoilienhe       = $request->nguoilienhe;
        $post->email_nguoilienhe = $request->email;
        $post->mucluong_tu      = $request->mucluong_tu;
        $post->mucluong_den     = $request->mucluong_den;
        
        $post->save();
        $nganhnghe = $request->nganhnghe; 
        $post->nganhnghe()->sync($nganhnghe); 
        return redirect(route('post.index'));
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

    public function trangthaicongviec(){
         $danhsachbaidang = Tuyendung_post::where('tuyendung_user_id', Auth::user()->id)->where('time_nophoso','<',date('Y-m-d'))->orderBy('id','desc')->paginate(10);
        return view('tuyendung.post.trangthai',['danhsachbaidang'=>$danhsachbaidang]);
    }
}
