<?php

    namespace App\Http\Controllers\Tuyendung;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class TuyendungHomeController extends Controller
    {
        //
        public function index()
        {
            return view('tuyendung.index');
        }
    }
