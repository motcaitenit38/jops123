@extends('auth.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <div class="alert alert-danger error errorLogin" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p style="color:red; display:none;" class="error errorLogin"></p>
                        </div>
                        <div class="form-group row">

                            <label for="email"
                                   class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required autofocus>


                                <p style="color:red; display: none" class="error errorEmail"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                <p style="color:red; display: none" class="error errorPassword"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="dang-nhap" type="button" class="btn btn-primary dmajax">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function () {
            $('#dang-nhap').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ asset('/login') }}',
                    'data': {
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    },
                    'type': 'POST',
                    success: function (data) {
                        console.log(data);
                        if (data.error == true) {
                            $('.error').hide();
                            if (data.message.email != undefined) {
                                $('.errorEmail').show().text(data.message.email[0]);
                            }

                            if (data.message.password != undefined) {
                                $('.errorPassword').show().text(data.message.password[0]);
                            }

                            if (data.message.errorlogin != undefined) {
                                $('.errorLogin').show().text(data.message.errorlogin);
                            }
                        } else {
                            // window.location.href = "http://localhost/authentication/public/"
                            alert('thanh cong');
                        }
                    }
                });
            })
        });
    </script>

@endsection