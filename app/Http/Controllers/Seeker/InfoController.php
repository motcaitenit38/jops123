<?php

    namespace App\Http\Controllers\Seeker;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\User;
    use Auth;

    class InfoController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $info = User::find(Auth::user()->id);
            return view('seeker.info.get', ['info' => $info]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
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
            $info = User::find($id);
            return view('seeker.info.edit', ['info' => $info]);
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
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$id,
                'phone'=>'required',
                'address'=>'required',
                'avatar'=>'mimes:jpg,png,jpeg'
            ], [
                'name.required'=>'Họ tên không được để trống',
                'name.string'=>'Họ tên không đúng',
                'name.max'=>'Họ tên quá dài',
                'email.required'=>'Email không được để trống',
                'email.string'=>'Email không đúng',
                'email.email'=>'Email không đúng',
                'email.max'=>'Email quá dài',
                'email.unique'=>'Email đã có người khác sử dụng',
                'phone.required'=>'Điện thoại không được để trống',
                'phone.address'=>'Địa chỉ không được để trống',
                'avatar.mimes'=>'Bạn chỉ được up avatar là file ảnh'
            ]);
            if ($request->hasFile('avatar')) {
                $cover = $request->avatar;
                $cover_name = time() . '.' . $cover->getClientOriginalName();
                $cover_name = $cover->move('upload\info', $cover_name);
                $info = User::find($id);
                $info->name = $request->name;
                $info->email = $request->email;
                $info->phone_number = $request->phone;
                $info->address = $request->address;
                $info->avatar = $cover_name;
                $info->save();
                return redirect()->route('info-seeker.index');
            }else{
                $info = User::find($id);
                $info->name = $request->name;
                $info->email = $request->email;
                $info->phone_number = $request->phone;
                $info->address = $request->address;
                $info->save();
                return redirect()->route('info-seeker.index');
            }
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
