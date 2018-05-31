<?php

    namespace App\Http\Controllers\Employer;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use App\Employer\Jop;

    class Ql_ungvien_Controller extends Controller
    {
        //
        public function danhsachcongviec()
        {
            $jop = Jop::where('employer_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            return view('employer.ql-seeker.danhsach_jop', ['jop' => $jop]);
        }

        public function danhsachungvien($id)
        {
            $jop = Jop::find($id);
            $cv = $jop->jop_cv;
            return view('employer.ql-seeker.danhsach_cv', ['cv' => $cv]);
        }
    }
