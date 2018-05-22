<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diachi\Tinhthanhpho;
use App\Tuyendung\Tuyendung_post;
use App\Nganhnghe;
use App\Tuyendung\Tuyendung_info;

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
        $nganhnghe = Nganhnghe::all();
        return view('home',['tinh'=>$tinh,'nganhnghe'=>$nganhnghe]);
    }

    public function search(Request $request){

        $abc = $request->search;
        $tp = $request->diachi;
        if($abc == ''){

            $congviec = Tuyendung_post::where('noilamviec',$tp)->orderBy('id','desc')->paginate(10);

            foreach ($congviec as $value) {
                $abc = $value->tuyendung_user_id;
            }

            $tencongty = Tuyendung_info::where('tuyendung_id',$abc)->first();
            $tencongty = $tencongty->tencongty;
            return view('timkiem.ketqua',['congviecs'=>$congviec,'tencongty'=>$tencongty]);
        }
        else{
            $congviec = Tuyendung_post::where('tencongviec','like', '%'.$abc.'%')
            ->where('noilamviec',$tp)
            ->orderBy('id','desc')->paginate(10);

            foreach ($congviec as $value) {
                $abc = $value->tuyendung_user_id;
            }

            $tencongty = Tuyendung_info::where('tuyendung_id',$abc)->first();
            $tencongty = $tencongty->tencongty;
            return view('timkiem.ketqua',['congviecs'=>$congviec,'tencongty'=>$tencongty]);
        }
    }

    public function chitiet($id){
        $chitiet = Tuyendung_post::where('id',$id)->first();
        $info = Tuyendung_info::where('tuyendung_id', $chitiet->tuyendung_user_id)->first();
        return view('timkiem.chitiet-congviec',['chitiet'=>$chitiet,'thongtincongty'=>$info]);
    }


}
