<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tuyendung\Chitietcongviec;

class TimkiemController extends Controller
{

    public function user_serach(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $abc = $request->timkiem;
        $tp = $request->diachi;
        if ($abc == '') {
            $congviec = Chitietcongviec::paginate(10);
            return view('timkiem.ketqua', ['congviecs' => $congviec]);
        } else {
            $congviec = Chitietcongviec::where('tencongviec', 'like', '%' . $abc . '%')->where('diadiem_tp',
                $tp)->orderBy('id', 'desc')->paginate(10);
            return view('timkiem.ketqua', ['congviecs' => $congviec]);
        }
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
        $abc = $request->timkiem;
        $tp = $request->diachi;
        // dd('dfdf');
        if ($abc == '') {
            $congviec = Chitietcongviec::paginate(10);
            return view('timkiem.ketqua', ['congviecs' => $congviec]);
        } else {
            $congviec = Chitietcongviec::where('tencongviec', 'like', '%' . $abc . '%')->where('diadiem_tp',
                $tp)->orderBy('id', 'desc')->paginate(10);
            return view('timkiem.ketqua', ['congviecs' => $congviec]);
        }
        // return view('timkiem.ketqua');
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
