<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Address;
    use App\Employer\Jop;

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
            return view('search.detail-jop',['jop'=>$jop]);
        }


    }
