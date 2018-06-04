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
                date('Y-m-d'))->orderBy('id',
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
//            dd($request->thoi_gian_thuc_hien);
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
                'chi_tiet_cong_viec' => 'required',
                'yeu_cau_cong_viec' => 'required',
                'phuc_loi_cong_viec' => 'required',
                'yeu_cau_ho_so_dinh_kem' => 'required',
                'attach_spec' => 'required',
                'attach_boq' => 'required',
                'attach_ban_ve_ket_cau' => 'required',
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
                $attach_spec_name = time() . $attach_spec->getClientOriginalName();
                // Lưu thư mục nào
                $attach_spec->storeAs('upload/' . $model->getTable() . '/attach-spec', $attach_spec_name);
                //Lưu DB
                $model->attach_spec = 'upload/' . $model->getTable() . '/attach-spec/' . $attach_spec_name;
            }
            if ($request->hasFile('attach_spec')) {

                $attach_boq = $request->file('attach_spec');
                $attach_boq_name = time() . $attach_boq->getClientOriginalName();
                // Lưu thư mục nào
                $attach_boq->storeAs('upload/' . $model->getTable() . '/attach-boq', $attach_boq_name);
                //Lưu DB
                $model->attach_boq = 'upload/' . $model->getTable() . '/attach-boq/' . $attach_spec_name;
            }
            if ($request->hasFile('attach_ban_ve_ket_cau')) {
                $attach_ban_ve_ket_cau = $request->file('attach_ban_ve_ket_cau');
                $attach_ban_ve_ket_cau_name = time() . $attach_ban_ve_ket_cau->getClientOriginalName();
                // Lưu thư mục nào
                $attach_ban_ve_ket_cau->storeAs('upload/' . $model->getTable() . '/attach',
                    $attach_ban_ve_ket_cau_name);
                //Lưu DB
                $model->attach_ban_ve_ket_cau = 'upload/' . $model->getTable() . '/attach/' . $attach_spec_name;
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
                'chi_tiet_cong_viec' => 'required',
                'yeu_cau_cong_viec' => 'required',
                'phuc_loi_cong_viec' => 'required',
                'yeu_cau_ho_so_dinh_kem' => 'required',
                'attach_spec' => 'required',
                'attach_boq' => 'required',
                'attach_ban_ve_ket_cau' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('job.edit',$id)
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('attach_spec')) {
                if (file_exists($model->attach_spec)) {
                    unlink(public_path($model->attach_spec));
                }
            }

            if ($request->hasFile('attach_boq')) {
                if (file_exists($model->attach_boq)) {
                    unlink(public_path($model->attach_boq));
                }
            }

            if ($request->hasFile('attach_ban_ve_ket_cau')) {
                if (file_exists($model->attach_ban_ve_ket_cau)) {
                    unlink(public_path($model->attach_ban_ve_ket_cau));
                }
            }
            $model->fill($request->all());
            if ($request->hasFile('attach_spec')) {

                $attach_spec = $request->file('attach_spec');
                $attach_spec_name = time() . $attach_spec->getClientOriginalName();
                // Lưu thư mục nào
                $attach_spec->storeAs('upload/' . $model->getTable() . '/attach-spec', $attach_spec_name);
                //Lưu DB
                $model->attach_spec = 'upload/' . $model->getTable() . '/attach-spec/' . $attach_spec_name;
            }
            if ($request->hasFile('attach_spec')) {

                $attach_boq = $request->file('attach_spec');
                $attach_boq_name = time() . $attach_boq->getClientOriginalName();
                // Lưu thư mục nào
                $attach_boq->storeAs('upload/' . $model->getTable() . '/attach-boq', $attach_boq_name);
                //Lưu DB
                $model->attach_boq = 'upload/' . $model->getTable() . '/attach-boq/' . $attach_spec_name;
            }
            if ($request->hasFile('attach_ban_ve_ket_cau')) {
                $attach_ban_ve_ket_cau = $request->file('attach_ban_ve_ket_cau');
                $attach_ban_ve_ket_cau_name = time() . $attach_ban_ve_ket_cau->getClientOriginalName();
                // Lưu thư mục nào
                $attach_ban_ve_ket_cau->storeAs('upload/' . $model->getTable() . '/attach',
                    $attach_ban_ve_ket_cau_name);
                //Lưu DB
                $model->attach_ban_ve_ket_cau = 'upload/' . $model->getTable() . '/attach/' . $attach_spec_name;
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

        public function getNganh($idLinhvuc)
        {
            $nganh = Nganh::where('linh_vuc_id', $idLinhvuc)->get();
            foreach ($nganh as $value) {
                echo "<option value='" . $value->id . "'>" . $value->ten_nganh . "</option>";
            }
        }

        public function jobhethan()
        {
            //
            $job = TuyendungJob::where('employer_id', Auth::user()->id)->where('thoi_gian_bao_gia', '<=',
                date('Y-m-d'))->orderBy('id',
                'DESC')->paginate(10);
            return view('tuyendung.job.get_job', ['jobs' => $job]);

        }
    }