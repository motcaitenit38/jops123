<?php

    namespace App\Http\Controllers\Tuyendung;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use App\Model\Tuyendung\ThongtinTuyendung;
    use App\Model\Address;
    use Illuminate\Support\Facades\Validator;

    class TuyendungThongtinController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $info = ThongtinTuyendung::where('employer_id', Auth::user()->id)->first();
            if ($info == null) {
                return redirect()->route('info.create')->with([
                    'alert' => 'danger',
                    'thongbao' => 'Bạn chưa có thông tin cá nhân, vui lòng nhập thông tin cá nhân trước',
                ]);
            } else {
                return view('tuyendung.info.get-info', ['info' => $info]);
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
            return view('tuyendung.info.add-info', ['address' => $address]);
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
                'ten_doanh_nghiep' => 'required|max:250',
                'dien_thoai' => 'required|min:9|max:12',
                'website' => 'required',
                'dia_diem_id' => 'required',
                'dia_diem_cuthe' => 'required',
                'ma_so_thue' => 'required',
                'von_dieu_le' => 'required',
                'nam_thanh_lap' => 'required',
                'loai_hinh_doanh_nghiep' => 'required',
                'gioi_thieu_cong_ty' => 'required|min:20',
                'logo' => 'min:png,jpeg,jpg',
            ]);
            if ($validator->fails()) {
                return redirect()->route('info.create')->withErrors($validator)->withInput();
            }
            $model = new ThongtinTuyendung();
            $model->fill($request->all());
            $model->fill($request->all());
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logo_name = time() .$logo->getClientOriginalName();
                $logo_name = $logo->move('upload/tuyendung_info', $logo_name);
                $model->logo = $logo_name;
            }
            $model->employer_id = Auth::user()->id;
            $flag = $model->save();
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('info.index'));
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
            $info = ThongtinTuyendung::findOrFail($id);
            $address = Address::all();
            return view('tuyendung.info.edit-info', ['info' => $info, 'address' => $address]);

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
            $model = ThongtinTuyendung::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'ten_doanh_nghiep' => 'required|max:250',
                'dien_thoai' => 'required|min:9|max:12',
                'website' => 'required',
                'dia_diem_id' => 'required',
                'dia_diem_cuthe' => 'required',
                'ma_so_thue' => 'required',
                'von_dieu_le' => 'required',
                'nam_thanh_lap' => 'required',
                'loai_hinh_doanh_nghiep' => 'required',
                'gioi_thieu_cong_ty' => 'required|min:20',
                'logo' => 'min:png,jpeg,jpg',
            ]);
            if ($validator->fails()) {
                return redirect()->route('info.edit', $id)->withErrors($validator)->withInput();
            }
            $model->fill($request->all());
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logo_name = time() .$logo->getClientOriginalName();
                $logo_name = $logo->move('upload/tuyendung_info', $logo_name);
                $model->logo = $logo_name;
            }
            $model->employer_id = Auth::user()->id;
            $flag = $model->save();
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('info.index'));
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
