<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Address;
    use App\Employer\Jop;
    use Session;
    use URL;

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
            Session::put('pre_login_url', URL::current());
            $jop = Jop::find($id);
            return view('search.detail-jop', ['jop' => $jop]);
        }

        public function save_jops(Request $request)
        {

            $jop_id = $request['jop_id'];
            $user_id = $request['user_id'];
            $jop = Jop::find($jop_id);
            $save = array($user_id);
            $abc = $jop->jop_save()->sync($save);
             dd($abc);
            return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);
        }

    }
