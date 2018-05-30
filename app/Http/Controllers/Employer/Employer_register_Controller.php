<?php

    namespace App\Http\Controllers\Employer;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Hash;
    use Auth;
    use App\Employer;
    use Validator;
    use App\User;

    class Employer_register_Controller extends Controller
    {
        //
        public function __contruct()
        {
            $this->middleware('guest:employer');
        }

        public function showRegistForm()
        {
            return view('employer.register');
        }

        public function submitRegist(Request $request)
        {
            $this->validate($request, [
                'name' => 'required|max:255|min:5',
                'email' => 'required|email|max:255|unique:employers',
                'password' => 'required|min:6|confirmed',
            ],
                [
                    'name.min' => 'Tên quá ngắn',
                    'name.required' => 'Vui lòng nhập vào họ tên',
                    'name.max' => 'Họ tên quá dài',
                    'email.required' => 'Vui lòng nhập vào email',
                    'email.email' => 'Email không đúng định dạng',
                    'email.max' => 'email quá dài',
                    'email.unique' => 'email đã được đăng ký',
                    'password.required' => 'Vui lòng nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                    'password.confirmed' => '2 mật khẩu không khớp'

                ]);
            $tuyendung = new Employer;
            $tuyendung->name = $request['name'];
            $tuyendung->email = $request['email'];
            $tuyendung->password = bcrypt($request['password']);
            $tuyendung->save();
            return redirect(route('employer.login'));

        }

        public function posRegister(Request $request)
        {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ];
            $messages = [
                'name.required' => 'Họ tên là trường bắt buộc',
                'email.required' => 'Họ tên là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.confirmed' => ' 2 Mật khẩu không khớp',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);
            } else {
                if (User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ])) {
                    return response()->json([
                        'error' => false,
                        'message' => 'success'
                    ], 200);
                } else {
                    //
                    $loi = ['errorregister' => 'Email hoặc mật khẩu không đúng'];
                    return response()->json([
                        'error' => true,
                        'message' => $loi
                    ], 200);
                }
            }
        }
    }
