<?php

    namespace App\Http\Controllers\Timviec;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Model\Address;
    use App\Model\LinhVuc;
    use Illuminate\Support\Facades\Validator;
    use Auth;
    use App\Model\Timviec\TimviecCv;
    use App\Model\Timviec\ThongtinTimviec;

    class TimviecCvController extends Controller
    {
        public function __construct()
        {
            $this->middleware(function ($request, $next) {
                $thongtin = ThongtinTimviec::where('user_id',Auth::user()->id)->first();
                if (!isset($thongtin)) {
                    session()->flash('danger',"Bạn chưa cập nhật thông tin công ty, vui lòng nhập thông tin công ty!!!");
                    return redirect()->route('thongtintimviec.create');
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
            $cv = TimviecCv::where('user_id',Auth::user()->id)->get();
            return view('timviec.cv.get-cv', ['cvs' => $cv]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
            $linhvuc = LinhVuc::all();
            $address = Address::all();
            return view('timviec.cv.add-cv', ['address' => $address, 'linhvuc' => $linhvuc]);
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
                'nganh_id' => 'required',
                'ten_cv' => 'required|min:5',
                'diachi_id' => 'required',
                'gia_tri_hop_dong_lon' => 'required',
                'so_nam_kinh_nghiem' => 'required',
                'thiet_bi' => 'required',
                'gioi_thieu' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('cvtimviec.create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $model = new TimviecCv();
            $model->fill($request->all());
            $model->user_id = Auth::user()->id;
            $model->thiet_bi = json_encode($request->thiet_bi);
            $flag = $model->save();
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('cvtimviec.index'));
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
            $cv = TimviecCv::findOrFail($id);
            $linhvuc = LinhVuc::all();
            $address = Address::all();
            $a = $cv->thiet_bi;
            $b = json_decode($a, true);
            return view('timviec.cv.edit-cv', ['cv' => $cv, 'address' => $address, 'linhvuc' => $linhvuc, 'b' => $b]);
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
            $model = TimviecCv::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'nganh_id' => 'required|min:5',
                'ten_cv' => 'required',
                'diachi_id' => 'required',
                'gia_tri_hop_dong_lon' => 'required',
                'so_nam_kinh_nghiem' => 'required',
                'thiet_bi' => 'required',
                'gioi_thieu' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('cvtimviec.edit',$id)
                    ->withErrors($validator)
                    ->withInput();
            }
            $model->fill($request->all());
            $model->user_id = Auth::user()->id;
            $model->thiet_bi = json_encode($request->thiet_bi);
            $flag = $model->save();
            if ($flag) {
                session()->flash('success', "Thành công!!!");
            } else {
                session()->flash('danger', "Không thành công!!!");
            }
            return redirect(route('cvtimviec.index'));
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
            $cv = TimviecCv::findOrFail($id);
            $cv->delete();
            return redirect()->route('cvtimviec.index');
        }
        public function xoacv(Request $request)
        {
            //
//            return $request['id_cv'];
            $cv = TimviecCv::findOrFail($request['id_cv']);
            $cv->delete();
            return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);

        }
    }
