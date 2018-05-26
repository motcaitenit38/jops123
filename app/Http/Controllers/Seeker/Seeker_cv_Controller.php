<?php

    namespace App\Http\Controllers\Seeker;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use App\Academic_level;
    use App\Career;
    use App\Experience;
    use App\Form_work;
    use App\Position;
    use App\Address;
    use App\Seeker\Seeker_cv;

    class Seeker_cv_Controller extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $cv = Seeker_cv::where('user_id', Auth::user()->id)->paginate(10);
            return view('seeker.cv.get-cv',['cvs'=>$cv]);
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
            $form_works = Form_work::all();
            $positions = Position::all();
            $careers = Career::all();
            $academics = Academic_level::all();
            $experience = Experience::all();
            return view('seeker.cv.add-cv', [
                'address' => $address,
                'form_work' => $form_works,
                'position' => $positions,
                'careers' => $careers,
                'academic' => $academics,
                'experience' => $experience,
            ]);
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
                'name_cv' => 'required|min:5|max:100',
                'address' => 'required',
                'academic_level' => 'required',
                'experience'=>'required',
                'form_work' => 'required',
                'position' => 'required',
                'career' => 'required',
                'description' => 'required',
                'attach_file' => 'required|mimes:doc,docx,pdf',
            ], [
                'name_cv.required' => 'Vui lòng nhập tên CV',
                'name_cv.min' => 'tên CV quá ngắn',
                'name_cv.max' => 'tên CV quá dài',
                'address.required' => 'Vui lòng chọn nơi làm việc',
                'academic_level.required' => 'Vui lòng chọn trình độ học vấn',
                'experience.required' => 'Vui lòng chọn trình độ học vấn',
                'form_work.required' => 'Vui lòng chọn hình thức làm việc',
                'position.required' => 'Vui lòng chọn chức vụ',
                'career.required' => 'Vui lòng chọn ngành nghề',
                'description.required' => 'Vui lòng giới thiệu đôi chút về bản thân',
                'attach_file.required' => 'Vui lòng file CV đính kèm',
                'attach_file.mimes' => 'Bạn chỉ được phép upload file *doc, *docx, *pdf',
            ]);
            $cv = new Seeker_cv;
            $cv->name_cv = $request->name_cv;
            $cv->user_id = Auth::user()->id;
            $cv->address_id = $request->address;
            $cv->academic_level_id = $request->academic_level;
            $cv->experience_id = $request->experience;
            $cv->form_work_id = $request->form_work;
            $cv->position_id = $request->position;
            $cv->career_id = $request->career;
            $cv->description = $request->description;
            if ($request->hasFile('attach_file')) {
                $file = $request->attach_file;
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                $file_name = $file->move('upload\cv', $file_name);
            }
            $cv->attach_cv = $file_name;
            $cv->save();
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
            $cv = Seeker_cv::find($id);
            return view('seeker.cv.show-cv',['cvs'=>$cv]);
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
