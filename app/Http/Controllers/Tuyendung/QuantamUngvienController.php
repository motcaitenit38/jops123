<?php

    namespace App\Http\Controllers\Tuyendung;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Employer;
    use Auth;
    use App\Model\Timviec\ThongtinTimviec;
    use App\Model\Tuyendung\TuyendungQuantamTimviec;

    class QuantamUngvienController extends Controller
    {
        // danh sách các công ty tìm việc mà thằng tuyển dụng đã quan tâm
        public function danhsach()
        {
            $nhatuyendung = Employer::findOrFail(Auth::user()->id);
            $danhsach = $nhatuyendung->danhsachquantam;
            return view('tuyendung.ungvien.danhsachquantam', ['danhsach' => $danhsach]);
        }
// chi tiết thông tin công ty của thằng tìm việc
        public function chitiet($id){
            $all_quantam = TuyendungQuantamTimviec::where('employer_id', Auth::user()->id)->get();
            $mangquantam = array();
            foreach ($all_quantam as $quantam) {
                array_push($mangquantam, $quantam->thongtin_timviec_id);
            }
            $thongtin = ThongtinTimviec::findOrFail($id);
            return view('search.thongtincongty.timviec', ['thongtin' => $thongtin, 'allquantam' => $mangquantam]);
        }
    }
