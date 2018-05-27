@extends('search.template.app')
@section('title')
    Chi tiết việc {{ $jop->jop_name }}
@endsection
@section('content')
    <div class="clearfix"></div>
    <section class="inner-header-title">
        <div class="container">
            <h1>Chi tiết công việc</h1></div>
    </section>
    <div class="clearfix"></div>
    <section class="detail-desc">
        <div class="container white-shadow">
            <div class="row">
                <div class="detail-pic"><img src="{{ asset('/'.$jop->employer_info->logo)  }}" class="img" alt=""/><a
                            href="#" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>
                <div class="detail-status"><span>2 Days Ago</span></div>
            </div>
            <div class="row bottom-mrg">
                <div class="col-md-8 col-sm-8">
                    <div class="detail-desc-caption">
                        <h3>{{ $jop->jop_name }}</h3>
                        <p>{{ $jop->employer_info->company_name }}</p>
                        <ul>
                            <li><i class="fa fa-briefcase"></i>Hình thức làm việc:
                                <span>{{ $jop->form_work->form_work_name }}</span></li>
                            <li><i class="fa fa-flask"></i>Số năm kinh nghiệm:
                                <span>{{ $jop->experience->experience_name }}</span></li>
                            <li><i class="fa fa-money"></i>Mức lương:
                                <span>{{ $jop->salary_level->salary_level_name }}</span></li>
                            <li><i class="fa fa-flask"></i>Trình độ:
                                <span>{{ $jop->academic->academic_level_name }}</span></li>
                            <li><i class="fa fa-flask"></i>Chức vụ: <span>{{ $jop->position->position_name }}</span>
                            </li>
                            <li><i class="fa fa-flask"></i>Nơi làm việc: <span>{{ $jop->address->name }}</span></li>
                            <li><i class="fa fa-flask"></i>Ngành nghề:
                                <span>@foreach($jop->career as $career) {{ $career->career_name }}, @endforeach</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="get-touch">
                        <h4>Thông tin liên hệ</h4>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><span>{{ $jop->contact }}</span></li>
                            <li><i class="fa fa-envelope"></i><span>{{ $jop->contact_email }}</span></li>
                            <li><i class="fa fa-globe"></i><span>{{ $jop->employer_info->website }}</span></li>
                            <li><i class="fa fa-phone"></i><span>{{ $jop->contact_phone }}</span></li>
                            <li><i class="fa fa-money"></i><span>{{ date('d-m-Y',strtotime($jop->deadline)) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row no-padd">
                <div class="detail pannel-footer">
                    <div class="col-md-5 col-sm-5">
                        <ul class="detail-footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="detail-pannel-footer-btn pull-right">
                            @if(!Auth::guard('web')->check())
                                <a class="footer-btn grn-btn" href="javascript:void(0)" data-toggle="modal"
                                   data-target="#signup" class="signin">ứng tuyển</a>
                                <a href="javascript:void(0)" data-toggle="modal"
                                   data-target="#signup" class="footer-btn blu-btn" title="">Lưu công việc</a>
                            @else
                                {{--                                <a href="{{ url('/seeker/ungtuyen/'.$jop->id) }}" class="footer-btn grn-btn" title="">Ứng tuyển</a>--}}
                                <a href="" id="kiemtracv" class="footer-btn grn-btn" title="">Ứng tuyển</a>
                                <a href="" class="footer-btn blu-btn" id="save-jop" title="">Lưu công việc</a>
                                <input type="text" value="{{ $jop->id }}" style="display: none;" id="jop_id">
                                <input type="text" value="{{ Auth::user()->id }}" style="display: none;" id="user_id">
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="full-detail-description full-detail">
        <div class="container">
            <div class="row row-bottom">
                <h2 class="detail-title">Chi tiết công việc</h2>
                <p>{{ $jop->jop_details }}</p>
            </div>
            <div class="row row-bottom">
                <h2 class="detail-title">Yêu cầu công việc</h2>
                <p>{{ $jop->jop_requirements }}</p>
                </ul>
            </div>
            <div class="row row-bottom">
                <h2 class="detail-title">Quyền lợi</h2>
                <p>{{ $jop->benefits }}</p>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function () {
            $('#save-jop').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ url('seeker/save') }}',
                    'data': {
                        'jop_id': $('#jop_id').val(),
                        'user_id': $('#user_id').val()
                    },
                    'type': 'POST',
                    success: function (data) {
                        alert('Lưu công việc thành công');
                    }

                });
            });
        });
    </script>
    {{--kiểm tra tạo cv--}}

    <script>
        $(function () {
            $('#kiemtracv').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ url('seeker/kiemtracv') }}',
                    'data': {
                       
                    },
                    'type': 'POST',
                    success: function (data) {
                        console.log(data);
                        if (data.error == true) {
                            alert('Bạn chưa tạo CV, vui lòng tạo CV cá nhân trước');
                            window.location.href = "{{ url('/seeker/cv/create') }}";
                        } else {
                            window.location.href = "{{ url('/seeker/ungtuyen/'.$jop->id) }}";
                        }
                    }
                });
            });
        });
    </script>

@endsection