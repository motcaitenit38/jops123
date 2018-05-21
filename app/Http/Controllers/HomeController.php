<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diachi\Tinhthanhpho;
use App\Tuyendung\Tuyendung_post;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $tinh = Tinhthanhpho::all();
        return view('home',['tinh'=>$tinh]);
    }

    public function timkiem(Request $request){

        $abc = $request->timkiem;
        $tp = $request->diachi;
        if($abc == ''){
            $congviec = Chitietcongviec::paginate(10);
            return view('timkiem.ketqua',['congviecs'=>$congviec]);
        }
        else{
            $congviec = Chitietcongviec::where('tencongviec','like', '%'.$abc.'%')->where('diadiem_tp',$tp)->orderBy('id','desc')->paginate(10);
            return view('timkiem.ketqua',['congviecs'=>$congviec]);
        }
    }


}
