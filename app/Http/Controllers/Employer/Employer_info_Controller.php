<?php

    namespace App\Http\Controllers\Employer {


        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use Auth;
        use App\Employer\Employer_info;
        use App\Address;

        class Employer_info_Controller extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
                //
                $info = Employer_info::where('employer_id', Auth::user()->id)->first();
                if ($info == null) {
                    return redirect()->route('info.create')->with([
                        'alert' => 'danger',
                        'thongbao' => 'Bạn chưa có thông tin cá nhân, vui lòng nhập thông tin cá nhân trước',
                    ]);
                } else {
                    return view('employer.info.get-info', ['info' => $info]);
                }
            }

            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
                //
                $address = Address::all();
                return view('employer.info.add-info', ['address' => $address]);
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
                $this->validate($request, [
                    'company_name' => 'required',
                    'phone' => 'required',
                    'website' => 'required',
                    'address' => 'required',
                    'logo' => 'required|image',
                    'cover' => 'required|image',
                    'description' => 'required',
                ], [
                    'company_name.required' => 'Vui lòng nhập tên công ty',
                    'phone.required' => 'Vui lòng nhập tên công ty',
                    'website.required' => 'Vui lòng nhập tên công ty',
                    'address.required' => 'Vui lòng chọn địa chỉ công ty',
                    'logo.required' => 'vui lòng upload logo công ty',
                    'logo.image' => 'logo không phải là hình ảnh',
                    'cover.required' => 'vui lòng upload ảnh đại diện của công ty',
                    'cover.image' => 'Avatar bạn up lên không phải là hình ảnh',
                    'description.required' => 'Vui lòng nhập nội dung giới thiệu công ty',
                ]);
                if ($request->hasFile('logo')) {
                    $logo = $request->logo;
                    $logo_name = time() . '.' . $logo->getClientOriginalName();
                    $logo_name = $logo->move('upload\info', $logo_name);
                }
                if ($request->hasFile('cover')) {
                    $cover = $request->cover;
                    $cover_name = time() . '.' . $cover->getClientOriginalName();
                    $cover_name = $cover->move('upload\info', $cover_name);
                }
                $info = new Employer_info;
                $info->company_name = $request->company_name;
                $info->phone = $request->phone;
                $info->website = $request->website;
                $info->employer_id = Auth::user()->id;
                $info->address = $request->address;
                $info->description = $request->description;
                $info->logo = $logo_name;
                $info->cover = $cover_name;
                $info->save();
                return redirect()->route('info.index')->with(['alert'=>'success','thongbao'=>'Thêm thông tin thành công']);

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
                $info = Employer_info::find($id);
                $address = Address::all();
                return view('employer.info.edit-info', ['info' => $info, 'address' => $address]);
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
                    'company_name' => 'required',
                    'phone' => 'required',
                    'website' => 'required',
                    'address' => 'required',
                    'logo' => 'image',
                    'cover' => 'image',
                    'description' => 'required',
                ], [
                    'company_name.required' => 'Vui lòng nhập tên công ty',
                    'phone.required' => 'Vui lòng nhập tên công ty',
                    'website.required' => 'Vui lòng nhập tên công ty',
                    'address.required' => 'Vui lòng chọn địa chỉ công ty',
                    'logo.image' => 'logo không phải là hình ảnh',
                    'cover.image' => 'Avatar bạn up lên không phải là hình ảnh',
                    'description.required' => 'Vui lòng nhập nội dung giới thiệu công ty',
                ]);
                if ($request->hasFile('logo')) {
                    $logo = $request->logo;
                    $logo_name = time() . '.' . $logo->getClientOriginalName();
                    $logo_name = $logo->move('upload\info', $logo_name);
                }
                if ($request->hasFile('cover')) {
                    $cover = $request->cover;
                    $cover_name = time() . '.' . $cover->getClientOriginalName();
                    $cover_name = $cover->move('upload\info', $cover_name);
                }

                $info = Employer_info::find($id);
                if(!isset($logo_name)){
                    $logo_name = $info->logo;
                }
                if(!isset($cover_name)){
                    $cover_name = $info->cover;
                }
                $info->company_name = $request->company_name;
                $info->phone = $request->phone;
                $info->website = $request->website;
                $info->employer_id = Auth::user()->id;
                $info->address = $request->address;
                $info->description = $request->description;
                $info->logo = $logo_name;
                $info->cover = $cover_name;
                $info->save();
                return redirect()->route('info.index')->with(['alert'=>'success','thongbao'=>'Thêm thông tin thành công']);
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
    }
