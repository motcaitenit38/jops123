<?php

    namespace App\Http\Controllers\Timviec;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Model\Address;
    use Illuminate\Support\Facades\Validator;
    use App\Model\Timviec\ThongtinTimviec;
    use Auth;

    class ThongtinTimviecController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $info = ThongtinTimviec::where('user_id', Auth::user()->id)->first();
            if ($info == null) {
                return redirect()->route('thongtintimviec.create')->with([
                    'alert' => 'danger',
                    'thongbao' => 'Bạn chưa có thông tin cá nhân, vui lòng nhập thông tin cá nhân trước',
                ]);
            } else {
                return view('timviec.info.get', ['info' => $info]);
            }
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
            return view('timviec.info.add', ['address' => $address]);
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
            $validator = Validator::make($request->all(),[
                'ten_doanh_nghiep' => 'required',
                'dien_thoai' => 'required',
                'website' => 'required',
                'dia_diem_id' => 'required',
                'dia_diem_cuthe' => 'required',
                'ma_so_thue' => 'required',
                'von_dieu_le' => 'required',
                'nam_thanh_lap' => 'required',
                'loai_hinh_doanh_nghiep' => 'required',
                'dien_tich_quy_mo' => 'required',
                'so_luong_day_chuyen' => 'required',
                'tong_cong_suat' => 'required',
                'file_dinh_kem_kinh_doanh' => 'required',
                'file_dinh_kem_thong_tin_cong_ty' => 'required',
                'gioi_thieu_cong_ty' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('thongtintimviec.create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $model = new ThongtinTimviec();
            $model->fill($request->all());
            if ($request->hasFile('file_dinh_kem_kinh_doanh')) {

                $attach_kinhdoanh = $request->file('file_dinh_kem_kinh_doanh');
                $attach_kinhdoanh_name = time() . $attach_kinhdoanh->getClientOriginalName();
                // Lưu thư mục nào
                $attach_kinhdoanh->storeAs('upload/' . $model->getTable() . '/kinhdoanh', $attach_kinhdoanh_name);
                //Lưu DB
                $model->file_dinh_kem_kinh_doanh = 'upload/' . $model->getTable() . '/kinhdoanh/' . $attach_kinhdoanh_name;
            }
            if ($request->hasFile('file_dinh_kem_thong_tin_cong_ty')) {

                $attach_gioithieu = $request->file('file_dinh_kem_thong_tin_cong_ty');
                $attach_gioithieu_name = time() . $attach_gioithieu->getClientOriginalName();
                // Lưu thư mục nào
                $attach_gioithieu->storeAs('upload/' . $model->getTable() . '/gioithieu', $attach_gioithieu_name);
                //Lưu DB
                $model->file_dinh_kem_thong_tin_cong_ty = 'upload/' . $model->getTable() . '/gioithieu/' . $attach_gioithieu_name;
            }
            $model->user_id = Auth::user()->id;
            $flag = $model->save();
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('thongtintimviec.index'));
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
            $info = ThongtinTimviec::findOrFail($id);
            $address = Address::all();
            return view('timviec.info.edit', ['info' => $info, 'address' => $address]);
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
            $model = ThongtinTimviec::findOrFail($id);
            $validator = Validator::make($request->all(),[
                'ten_doanh_nghiep' => 'required',
                'dien_thoai' => 'required',
                'website' => 'required',
                'dia_diem_id' => 'required',
                'dia_diem_cuthe' => 'required',
                'ma_so_thue' => 'required',
                'von_dieu_le' => 'required',
                'nam_thanh_lap' => 'required',
                'loai_hinh_doanh_nghiep' => 'required',
                'dien_tich_quy_mo' => 'required',
                'so_luong_day_chuyen' => 'required',
                'tong_cong_suat' => 'required',
                'file_dinh_kem_kinh_doanh' => 'required',
                'file_dinh_kem_thong_tin_cong_ty' => 'required',
                'gioi_thieu_cong_ty' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('thongtintimviec.edit', $id)
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('file_dinh_kem_kinh_doanh')) {
                if (file_exists($model->file_dinh_kem_kinh_doanh)) {
                    unlink(public_path($model->file_dinh_kem_kinh_doanh));
                }
            }

            if ($request->hasFile('file_dinh_kem_thong_tin_cong_ty')) {
                if (file_exists($model->file_dinh_kem_thong_tin_cong_ty)) {
                    unlink(public_path($model->file_dinh_kem_thong_tin_cong_ty));
                }
            }
            $model->fill($request->all());
            if ($request->hasFile('file_dinh_kem_kinh_doanh')) {

                $attach_kinhdoanh = $request->file('file_dinh_kem_kinh_doanh');
                $attach_kinhdoanh_name = time() . $attach_kinhdoanh->getClientOriginalName();
                // Lưu thư mục nào
                $attach_kinhdoanh->storeAs('upload/' . $model->getTable() . '/kinhdoanh', $attach_kinhdoanh_name);
                //Lưu DB
                $model->file_dinh_kem_kinh_doanh = 'upload/' . $model->getTable() . '/kinhdoanh/' . $attach_kinhdoanh_name;
            }
            if ($request->hasFile('file_dinh_kem_thong_tin_cong_ty')) {

                $attach_gioithieu = $request->file('file_dinh_kem_thong_tin_cong_ty');
                $attach_gioithieu_name = time() . $attach_gioithieu->getClientOriginalName();
                // Lưu thư mục nào
                $attach_gioithieu->storeAs('upload/' . $model->getTable() . '/gioithieu', $attach_gioithieu_name);
                //Lưu DB
                $model->file_dinh_kem_thong_tin_cong_ty = 'upload/' . $model->getTable() . '/gioithieu/' . $attach_gioithieu_name;
            }
            $model->user_id = Auth::user()->id;
            $flag = $model->save();
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('thongtintimviec.index'));
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
    }
