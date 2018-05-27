<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Auth;
    use Validator;


    class LoginController extends Controller
    {
        /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
        */

        use AuthenticatesUsers;

        /**
         * Where to redirect users after login.
         *
         * @var string
         */
        protected $redirectTo = 'seeker';

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }

        public function login(Request $request)
        {
            $rules = [
                'email' => 'required|email',
                'password' => 'required'
            ];
            $messages = [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);
                // return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $email = $request['email'];
                $password = $request['password'];
                if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $request->remember)) {
                    return response()->json([
                        'error' => false,
                        'message' => 'success'
                    ], 200);
                } else {
                    //
                    $loi = ['errorlogin' => 'Email hoặc mật khẩu không đúng'];
                    return response()->json([
                        'error' => true,
                        'message' => $loi
                    ], 200);
                }
            }
        }


        public function logout(Request $request)
        {
            $this->guard('web')->logout();

            /*if (!Auth::guard('web')->check() && !Auth::guard('employer')->check()) {
                $request->session()->flush();
                $request->session()->regenerate();
            }*/

            return redirect('');
        }


    }
