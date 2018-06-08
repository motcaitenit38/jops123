<?php

    namespace App\Http\Controllers\Tuyendung;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Model\Tuyendung\ThongtinTuyendung;

    class DanhsachTuyendungController extends Controller
    {
        //
        public function danhsach()
        {
            $danhsach = ThongtinTuyendung::all();
            return view('search.tuyendung.danhsach', ['danhsach' => $danhsach]);
        }

//        hàm tìm kiếm được truy xuất từ thằng tìm việc


    }
