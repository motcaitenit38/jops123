<?php

    namespace App\Http\Controllers\Timviec;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use Illuminate\Support\Facades\Validator;
    use App\Model\Timviec\TimviecCv;
    use App\Model\Timviec\Ungtuyen;
    use App\Model\Tuyendung\TuyendungJob;
    use App\Model\Tuyendung\ThongtinTuyendung;

    class TimviecHomeController extends Controller
    {
        //
        public function home()
        {
            return view('timviec.index');
        }

        public function kiemtracv(Request $request)
        {
            $cv = TimviecCv::where('user_id', Auth::user()->id)->get();
            if ($cv->isEmpty() == true) {
                return response()->json([
                    'error' => true,
                    'message' => 'chua co cv'
                ], 200);
            } else {
                return response()->json([
                    'error' => false,
                    'message' => 'success'
                ], 200);
            }
        }

        public function ungtuyen($id)
        {
            $jop = TuyendungJob::find($id);
            $thongtin = ThongtinTuyendung::where('employer_id', $jop->employer_id)->first();
            $cv = TimviecCv::where('user_id', Auth::user()->id)->get();
            return view('search.ung-tuyen', ['jop' => $jop, 'cv' => $cv, 'thongtin' => $thongtin]);
        }

        public function guicv(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'filedinhkem' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);
            }

            $cv_id = $request['cv_id'];
            $job_id = $request['job_id'];
            if ($request->hasFile('filedinhkem')) {
                $attach = $request->file('filedinhkem');
                $attach_name = time() . $attach->getClientOriginalName();
                $attach_name = $attach->move('upload\attach\ungtuyen', $attach_name);
            }
            $model = new Ungtuyen();
            $model->timviec_cv_id = $cv_id;
            $model->tuyendung_job_id = $job_id;
            $model->file_dinh_kem = $attach_name;
            $model->save();
            return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);
        }
    }
