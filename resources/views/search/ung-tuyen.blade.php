@extends('search.template.app')
@section('title')
    Chi tiết việc {{ $jop->jop_name }}
@endsection
@section('content')
    <div class="clearfix"></div>
    <section class="inner-header-title">
        <div class="container">
            <h1>Nộp hồ sơ ứng tuyển</h1></div>
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
                        <ul class="col-md-12" >
                            <h4>Chọn CV gửi cho nhà tuyển dụng </h4>
                        </ul>
                        <ul class="col-md-12" style="padding-top: 20px">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Họ tên</label>
                                <div class="col-sm-8">
                                    <input name="name" type="text" class="form-control" id="name_user"
                                           value="{{ $user_name->user_seeker->name }}" disabled/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cv" class="col-sm-2 col-form-label">Chọn CV</label>
                                <div class="col-sm-8">
                                    <select name="cv" id="cv" class="form-control">
                                        @foreach($cv as $cv)
                                            <option value="{{ $cv->id }}"
                                                    @if(old('cv') == $cv->id) selected @endif>{{ $cv->name_cv }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </ul>
                        <input type="text" id="jop_id" style="display: none" value="{{ $jop->id }}">
                        <div class="col-md-12 col-sm-12">
                            <div class="detail-pannel-footer-btn text-center">
                                <a href="#" class="footer-btn grn-btn btn-block" id="ungtuyen" title="">Gửi CV ứng tuyển</a>
                            </div>
                        </div>
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
                    {{--<div class="col-md-7 col-sm-7">--}}
                        {{--<div class="detail-pannel-footer-btn pull-right">--}}
                                {{--<a href="#" class="footer-btn grn-btn" title="">Ứng tuyển</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        $(function () {
            $('#ungtuyen').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ url('seeker/guicv') }}',
                    'data': {
                        'cv': $('#cv').val(),
                        'jop_id': $('#jop_id').val()
                    },
                    'type': 'POST',
                    success: function (data) {
                        alert('Bạn đã gửi CV ứng tuyển thành công');
                        window.location.href = "{{ route('seeker.index') }}"
                    }
                });
            })
        });
    </script>

@endsection