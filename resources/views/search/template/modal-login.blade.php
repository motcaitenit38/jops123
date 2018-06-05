<div class="clearfix"></div>
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tab" role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Đăng
                                nhập</a></li>
                        <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Đăng ký</a></li>
                    </ul>
                    <div class="tab-content" id="myModalLabel2">
                        <div role="tabpanel" class="tab-pane fade in active" id="login"><img src="{{ asset('search/img/logo.png') }}" class="img-responsive" alt=""/>
                            <div class="subscribe wow fadeInUp">
                                <div class="alert alert-danger error errorLogin" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <p style="color:red; display:none;" class="error errorLogin"></p>
                                </div>
                                <form class="form-inline" method="post">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input id="email" type="email" name="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}" required autofocus
                                                   placeholder="Username" required="">
                                            <p style="color:red; display: none" class="error errorEmail"></p>
                                            <input id="password" type="password" name="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" required placeholder="Password"">
                                            <p style="color:red; display: none" class="error errorPassword"></p>
                                            <div class="center">
                                                <button type="submit" id="login-ajax" class="submit-btn"> Đăng nhập
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="register"><img
                                    src="{{ asset('search/img/logo.png') }}" class="img-responsive" alt=""/>
                            <div class="alert alert-danger error errorLogin" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <p style="color:red; display:none;" class="error errorregister"></p>
                            </div>
                            <form class="form-inline" method="POST">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" autofocus placeholder="Họ và tên">
                                        <p style="color:red; display: none" class="error errorname"></p>
                                        <input id="email_rg" type="email"
                                               class="form-control{{ $errors->has('email_rg') ? ' is-invalid' : '' }}"
                                               name="email_rg" value="{{ old('email_rg') }}" placeholder="Email">
                                        <p style="color:red; display: none" class="error erroremail_rg"></p>
                                        <input id="password_rg" type="password"
                                               class="form-control{{ $errors->has('password_rg') ? ' is-invalid' : '' }}"
                                               name="password_rg" placeholder="Mật khẩu">
                                        <p style="color:red; display: none" class="error errorpassword_rg"></p>
                                        <input id="password_confirmation" type="password" class="form-control"
                                               name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                        <div class="center">
                                            <button type="submit" id="register-ajax" class="submit-btn"> Đăng ky
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script-login')
    <script>
        $(function () {
            $('#login-ajax').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ url('login') }}',
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
                            location.reload();
                        }
                    }
                });
            })
        });
    </script>
    <script>
        $(function () {
            $('#register-ajax').click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ url('register') }}',
                    'data': {
                        'name': $('#name').val(),
                        'email': $('#email_rg').val(),
                        'password': $('#password_rg').val(),
                        'password_confirmation': $('#password_confirmation').val()
                    },
                    'type': 'POST',
                    success: function (data) {
                        console.log(data);
                        if (data.error == true) {
                            $('.error').hide();
                            if (data.message.name != undefined) {
                                $('.errorname').show().text(data.message.name[0]);
                            }
                            if (data.message.email != undefined) {
                                $('.erroremail_rg').show().text(data.message.email[0]);
                            }

                            if (data.message.password != undefined) {
                                $('.errorpassword_rg').show().text(data.message.password[0]);
                            }

                            if (data.message.errorregister != undefined) {
                                $('.errorregister').show().text(data.message.errorregister);
                            }
                        } else {
                            alert('Đăng ký tài khoản thành công');
                            location.reload();
                        }
                    }
                });
            })
        });
    </script>
@endsection

