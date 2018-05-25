<?php

    namespace App\Http\Controllers\Employer;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Auth;
    use App\Employer;
    use App\Employer\Jop;
    use App\Employer\Employer_info;
    use App\Academic_level;
    use App\Career;
    use App\Experience;
    use App\Form_work;
    use App\Position;
    use App\Salary_level;
    use App\Address;

    class Employer_jop_Controller extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $jop = Jop::where('employer_id', Auth::user()->id)->where('deadline', '>', date('Y-m-d'))->orderBy('id',
                'DESC')->paginate(10);
            return view('employer.jop.get_jop', ['jops' => $jop]);

        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $address = Address::all();
            $form_works = Form_work::all();
            $positions = Position::all();
            $careers = Career::all();
            $academics = Academic_level::all();
            $experience = Experience::all();
            $salary_level = Salary_level::all();
            return view('employer.jop.add_jop', [
                'address' => $address,
                'form_work' => $form_works,
                'position' => $positions,
                'careers' => $careers,
                'academic' => $academics,
                'experience' => $experience,
                'salary_level' => $salary_level
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
            $this->validate($request, [
                'jop_name' => 'required|min:5|max:100',
                'address' => 'required',
                'form_work' => 'required',
                'position' => 'required',
                'career' => 'required',
                'academic_level' => 'required',
                'salary_level' => 'required',
                'jop_detail' => 'required',
                'jop_requirement' => 'required',
                'benefits' => 'required',
                'contact' => 'required',
                'contact_email' => 'required|email',
                'contact_phone' => 'required|min:9|max:12'
            ], [
                'jop_name.required' => 'Vui lòng nhập tên công ty',
                'jop_name.min' => 'tên công ty quá ngắn',
                'jop_name.max' => 'tên công ty quá dài',
                'address.required' => 'Vui lòng chọn nơi làm việc',
                'form_work.required' => 'Vui lòng chọn hình thức làm việc',
                'position.required' => 'Vui lòng chọn chức vụ',
                'career.required' => 'Vui lòng chọn ngành nghề',
                'academic_level.required' => 'Vui lòng chọn trình độ học vấn',
                'salary_level.required' => 'vui lòng chọn mức lương',
                'jop_detail.required' => 'Vui lòng nhập chi tiết công việc',
                'jop_requirement.required' => 'Vui lòng nhập yêu cầu công việc',
                'benefits.required' => 'Vui lòng nhập phúc lợi/chế độ công việc',
                'contact.required' => 'Vui lòng nhập họ tên người liên hệ',
                'contact_email.required' => 'Vui lòng nhập email người liên hệ',
                'contact_email.email' => 'Email người liên hệ không đùng định dạng',
                'contact_phone.required' => 'Vui lòng nhập số điện thoại người liên hệ',
                'contact_phone.min' => 'Số điện thoại không đúng.',
                'contact_phone.max' => 'Số điện thoại không đúng.'
            ]);
            $jop = new Jop;
            $jop->employer_id = Auth::user()->id;
            $jop->jop_name = $request->jop_name;
            $jop->address_id = $request->address;
            $jop->academic_level_id = $request->academic_level;
            $jop->experience_id = $request->experience;
            $jop->form_work_id = $request->form_work;
            $jop->salary_level_id = $request->salary_level;
            $jop->position_id = $request->position;
            $jop->jop_details = $request->jop_detail;
            $jop->jop_requirements = $request->jop_requirement;
            $jop->benefits = $request->benefits;
            $jop->deadline = $request->deadline;
            $jop->contact = $request->contact;
            $jop->contact_email = $request->contact_email;
            $jop->contact_phone = $request->contact_phone;
            $jop->save();

            $career = $request->career;
            $jop->career()->sync($career);
            return redirect()->route('jop.index');


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
            $address = Address::all();
            $form_works = Form_work::all();
            $positions = Position::all();
            $careers = Career::all();
            $academics = Academic_level::all();
            $experience = Experience::all();
            $salary_level = Salary_level::all();

            $jop = Jop::find($id);
            $career_jop = array();
            foreach ($jop->career()->get() as $item) {
                $career_jop[$item->id] = $item->career_name;
            }
            return view('employer.jop.edit_jop', [
                'jop' => $jop,
                'address' => $address,
                'form_work' => $form_works,
                'position' => $positions,
                'careers' => $careers,
                'academic' => $academics,
                'experience' => $experience,
                'salary_level' => $salary_level,
                'career_jop' => $career_jop
            ]);

//            $address = $jop->address->name;
//            $academic_level = $jop->academic->academic_level_name;
//            $experience = $jop->experience->experience_name;
//            $form_work = $jop->form_work->form_work_name;
//            $salary_level = $jop->salary_level->salary_level_name;
//            $position = $jop->position->position_name;
//            dd($position);
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
                'jop_name' => 'required|min:5|max:100',
                'address' => 'required',
                'form_work' => 'required',
                'position' => 'required',
                'career' => 'required',
                'academic_level' => 'required',
                'salary_level' => 'required',
                'jop_detail' => 'required',
                'jop_requirement' => 'required',
                'benefits' => 'required',
                'contact' => 'required',
                'contact_email' => 'required|email',
                'contact_phone' => 'required|min:9|max:12'
            ], [
                'jop_name.required' => 'Vui lòng nhập tên công ty',
                'jop_name.min' => 'tên công ty quá ngắn',
                'jop_name.max' => 'tên công ty quá dài',
                'address.required' => 'Vui lòng chọn nơi làm việc',
                'form_work.required' => 'Vui lòng chọn hình thức làm việc',
                'position.required' => 'Vui lòng chọn chức vụ',
                'career.required' => 'Vui lòng chọn ngành nghề',
                'academic_level.required' => 'Vui lòng chọn trình độ học vấn',
                'salary_level.required' => 'vui lòng chọn mức lương',
                'jop_detail.required' => 'Vui lòng nhập chi tiết công việc',
                'jop_requirement.required' => 'Vui lòng nhập yêu cầu công việc',
                'benefits.required' => 'Vui lòng nhập phúc lợi/chế độ công việc',
                'contact.required' => 'Vui lòng nhập họ tên người liên hệ',
                'contact_email.required' => 'Vui lòng nhập email người liên hệ',
                'contact_email.email' => 'Email người liên hệ không đùng định dạng',
                'contact_phone.required' => 'Vui lòng nhập số điện thoại người liên hệ',
                'contact_phone.min' => 'Số điện thoại không đúng.',
                'contact_phone.max' => 'Số điện thoại không đúng.'
            ]);
            $jop = Jop::find($id);
            $jop->employer_id = Auth::user()->id;
            $jop->jop_name = $request->jop_name;
            $jop->address_id = $request->address;
            $jop->academic_level_id = $request->academic_level;
            $jop->experience_id = $request->experience;
            $jop->form_work_id = $request->form_work;
            $jop->salary_level_id = $request->salary_level;
            $jop->position_id = $request->position;
            $jop->jop_details = $request->jop_detail;
            $jop->jop_requirements = $request->jop_requirement;
            $jop->benefits = $request->benefits;
            $jop->deadline = $request->deadline;
            $jop->contact = $request->contact;
            $jop->contact_email = $request->contact_email;
            $jop->contact_phone = $request->contact_phone;
            $jop->save();

            $career = $request->career;
            $jop->career()->sync($career);
            return redirect()->route('jop.index');

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

        public function expiration()
        {
            $jop = Jop::where('employer_id', Auth::user()->id)->where('deadline', '<', date('Y-m-d'))->orderBy('id','DESC')->paginate(10);
            return view('employer.jop.get_jop', ['jops' => $jop]);
        }
    }
