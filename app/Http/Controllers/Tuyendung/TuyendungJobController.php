<?php

    namespace App\Http\Controllers\Tuyendung;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use App\Model\Tuyendung\ThongtinTuyendung;
    use App\Model\Tuyendung\TuyendungJob;
    use App\Model\Address;
    use App\Model\LinhVuc;
    use App\Model\Nganh;
    use Illuminate\Support\Facades\Validator;

    class TuyendungJobController extends Controller
    {
        public function __construct()
        {
            $this->middleware(function ($request, $next) {
                $info = ThongtinTuyendung::where('employer_id', Auth::user()->id)->first();
                if ($info == null) {
                    session()->flash('danger',
                        "Bạn chưa có thông tin cá nhân, vui lòng nhập thông tin cá nhân trước!!!");
                    return redirect()->route('info.create');
                } else {
                }
                return $next($request);
            });
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $job = TuyendungJob::where('employer_id', Auth::user()->id)->where('thoi_gian_bao_gia', '>=',
                date('Y-m-d'))->where('trangthai',0)->orderBy('id',
                'DESC')->paginate(10);
            return view('tuyendung.job.get_job', ['jobs' => $job]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
            $address = Address::all();
            $linhvuc = LinhVuc::all();
            return view('tuyendung.job.add_job', ['address' => $address, 'linhvuc' => $linhvuc]);

        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            //
            $validator = Validator::make($request->all(), [
                'ten_cong_viec' => 'required|min:10',
                'gia_tri_cong_viec' => 'required',
                'thoi_gian_bao_gia' => 'required',
                'thoi_gian_thuc_hien' => 'required',
                'dia_diem_uu_tien' => 'required',
                'von_dieu_le' => 'required',
                'so_nam_kinh_nghiem' => 'required',
                'loai_hinh_doanh_nghiep' => 'required',
                'nhan_su' => 'required',
                'thiet_bi' => 'required',
                'chi_tiet_cong_viec' => 'required|min:20',
                'yeu_cau_cong_viec' => 'required|min:20',
                'phuc_loi_cong_viec' => 'required|min:20',
                'yeu_cau_ho_so_dinh_kem' => 'required|min:10',
                'attach_spec' => 'required|mimes:pdf,doc,docx',
                'attach_boq' => 'required|mimes:pdf,doc,docx',
                'attach_ban_ve_ket_cau' => 'required|mimes:pdf,jpg,jpeg,png',
            ]);
            if ($validator->fails()) {
                return redirect()->route('job.create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $model = new TuyendungJob();
            $model->fill($request->all());
            if ($request->hasFile('attach_spec')) {
                $attach_spec = $request->file('attach_spec');
                $attach_spec_name = time() .$attach_spec->getClientOriginalName();
                $attach_spec_name = $attach_spec->move('upload\tuyendung_jobs\spec', $attach_spec_name);
                $model->attach_spec = $attach_spec_name;

            }
            if ($request->hasFile('attach_boq')) {
                $attach_boq = $request->file('attach_boq');
                $attach_boq_name = time() .$attach_boq->getClientOriginalName();
                $attach_boq_name = $attach_boq->move('upload\tuyendung_jobs\boq', $attach_boq_name);
                $model->attach_boq = $attach_boq_name;

            }
            if ($request->hasFile('attach_ban_ve_ket_cau')) {
                $attach_ban_ve_ket_cau = $request->file('attach_ban_ve_ket_cau');
                $attach_ban_ve_ket_cau_name = time() .$attach_ban_ve_ket_cau->getClientOriginalName();
                $attach_ban_ve_ket_cau_name = $attach_ban_ve_ket_cau->move('upload\tuyendung_jobs\banve', $attach_ban_ve_ket_cau_name);
                $model->attach_ban_ve_ket_cau = $attach_ban_ve_ket_cau_name;
            }
            $model->thoi_gian_thuc_hien = json_encode($request->thoi_gian_thuc_hien);
            $model->gia_tri_cong_viec = json_encode($request->gia_tri_cong_viec);
            $model->nhan_su = json_encode($request->nhan_su);
            $model->thiet_bi = json_encode($request->thiet_bi);
            $model->employer_id = Auth::user()->id;
            $flag = $model->save();
            $nganh = $request->nganh;
            $model->job_nganh()->sync($nganh);
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('job.index'));

        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
            $jop = TuyendungJob::findOrFail($id);
            $a = $jop->thiet_bi;
            $nhansu = json_decode($jop->nhan_su);
            $b = json_decode($a, true);
            $thongtin = ThongtinTuyendung::where('employer_id', $jop->employer_id)->first();
            return view('search.detail-jop', ['jop' => $jop, 'thongtin' => $thongtin, 'b' => $b, 'nhansu' => $nhansu]);

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
            $job = TuyendungJob::findOrFail($id);
            $a = $job->thiet_bi;
            $b = json_decode($a, true);
            $linhvuc = LinhVuc::all();
            $address = Address::all();
            return view('tuyendung.job.edit_job',
                ['jop' => $job, 'linhvuc' => $linhvuc, 'address' => $address, 'b' => $b]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
            $model = TuyendungJob::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'ten_cong_viec' => 'required|min:10',
                'gia_tri_cong_viec' => 'required',
                'thoi_gian_bao_gia' => 'required',
                'thoi_gian_thuc_hien' => 'required',
                'dia_diem_uu_tien' => 'required',
                'von_dieu_le' => 'required',
                'so_nam_kinh_nghiem' => 'required',
                'loai_hinh_doanh_nghiep' => 'required',
                'nhan_su' => 'required',
                'thiet_bi' => 'required',
                'chi_tiet_cong_viec' => 'required|min:20',
                'yeu_cau_cong_viec' => 'required|min:20',
                'phuc_loi_cong_viec' => 'required|min:20',
                'yeu_cau_ho_so_dinh_kem' => 'required|min:10',
                'attach_spec' => 'mimes:pdf,doc,docx',
                'attach_boq' => 'mimes:pdf,doc,docx',
                'attach_ban_ve_ket_cau' => 'mimes:pdf,jpg,jpeg,png',
            ]);
            if ($validator->fails()) {
                return redirect()->route('job.edit',$id)
                    ->withErrors($validator)
                    ->withInput();
            }

            $model->fill($request->all());
            if ($request->hasFile('attach_spec')) {
                $attach_spec = $request->file('attach_spec');
                $attach_spec_name = time() .$attach_spec->getClientOriginalName();
                $attach_spec_name = $attach_spec->move('upload\tuyendung_jobs\spec', $attach_spec_name);
                $model->attach_spec = $attach_spec_name;
            }
            if ($request->hasFile('attach_boq')) {
                $attach_boq = $request->file('attach_boq');
                $attach_boq_name = time() .$attach_boq->getClientOriginalName();
                $attach_boq_name = $attach_boq->move('upload\tuyendung_jobs\boq', $attach_boq_name);
                $model->attach_boq = $attach_boq_name;
            }
            if ($request->hasFile('attach_ban_ve_ket_cau')) {
                $attach_ban_ve_ket_cau = $request->file('attach_ban_ve_ket_cau');
                $attach_ban_ve_ket_cau_name = time() .$attach_ban_ve_ket_cau->getClientOriginalName();
                $attach_ban_ve_ket_cau_name = $attach_ban_ve_ket_cau->move('upload\tuyendung_jobs\banve', $attach_ban_ve_ket_cau_name);
                $model->attach_ban_ve_ket_cau = $attach_ban_ve_ket_cau_name;
            }
            $model->thoi_gian_thuc_hien = json_encode($request->thoi_gian_thuc_hien);
            $model->gia_tri_cong_viec = json_encode($request->gia_tri_cong_viec);
            $model->nhan_su = json_encode($request->nhan_su);
            $model->thiet_bi = json_encode($request->thiet_bi);
            $model->employer_id = Auth::user()->id;
            $flag = $model->save();
            $nganh = $request->nganh;
            $model->job_nganh()->sync($nganh);
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('job.index'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
        public function jobhethan()
        {
            //
            $job = TuyendungJob::where('employer_id', Auth::user()->id)->where('thoi_gian_bao_gia', '<=',
                date('Y-m-d'))->orderBy('id',
                'DESC')->paginate(10);
            return view('tuyendung.job.get_job', ['jobs' => $job]);

        }

        public function xoajob($id){
            $model = TuyendungJob::findOrFail($id);
            $model->trangthai = 1;
            $flag = $model->save();
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('job.index'));
        }

        public function daxoa(){
            $job = TuyendungJob::where('employer_id', Auth::user()->id)->where('trangthai',1)->orderBy('id',
                'DESC')->paginate(10);
            return view('tuyendung.job.get_job', ['jobs' => $job]);
        }
    }
