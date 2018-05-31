<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Address;
    use App\Employer\Jop;
    use App\Seeker\Seeker_cv;
    use Auth;
    use App\jop_seeker_cv;
    use App\jop_user;

    class HomeController extends Controller
    {
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function home()
        {
            $address = Address::all();
            return view('index', ['address' => $address]);
        }

        public function search(Request $request)
        {
            $keywork = $request->kw;
            $tp = $request->address;
            $address = Address::all();
            if ($keywork == '') {
                $jop = Jop::where('address_id', $tp)->orderBy('id', 'desc')->paginate(10);
                return view('search.kqtk', ['jops' => $jop, 'address' => $address]);
            } else {
                $jop = Jop::where('jop_name', 'like', '%' . $keywork . '%')
                    ->where('address_id', $tp)
                    ->orderBy('id', 'desc')->paginate(10);
                return view('search.kqtk', ['jops' => $jop, 'address' => $address]);
            }
        }

        public function detail($id)
        {
            $jop = Jop::find($id);
            $all_cv = $jop->jop_cv->toArray();
            $jop_cv = array();
            foreach ($all_cv as $cv) {
                array_push($jop_cv, $cv['id']);
            }
            if (Auth::guard('web')->check()) {
                $all_jop = jop_user::where('user_id', Auth::user()->id)->get()->toArray();
                $jop_save = array();
                foreach ($all_jop as $jop_user) {
                    array_push($jop_save, $jop_user['jop_id']);
                }
                $seeker_cv = Seeker_cv::where('user_id', Auth::user()->id)->get();
                return view('search.detail-jop',
                    ['jop' => $jop, 'jop_cv' => $jop_cv, 'jop_save' => $jop_save, 'seeker_cv' => $seeker_cv]);
            } else {
                return view('search.detail-jop',
                    ['jop' => $jop]);
            }

        }

        public function save_jops(Request $request)
        {

            $jop_id = $request['jop_id'];
            $user_id = $request['user_id'];
            $jop = Jop::find($jop_id);
            $save = array($user_id);
            $jop->jop_save()->attach($save);
            return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);
        }

        public function kiemtracv(Request $request)
        {
            $cv = Seeker_cv::where('user_id', Auth::user()->id)->get();
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
            $jop = Jop::find($id);
            $cv = Seeker_cv::where('user_id', Auth::user()->id)->get();
            $user_name = Seeker_cv::where('user_id', Auth::user()->id)->first();
            return view('search.ung-tuyen', ['jop' => $jop, 'cv' => $cv, 'user_name' => $user_name]);
        }

        public function guicv(Request $request)
        {
            $jop_id = $request['jop_id'];
            $cv_id = $request['cv'];
            $cv = Seeker_cv::find($cv_id);
            $save = array($jop_id);
            $abc = $cv->cv_jop()->attach($save);
            return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);
        }

    }
