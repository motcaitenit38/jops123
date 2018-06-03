@extends('search.template.app')
@section('title')
    Chi tiết việc {{ $jop->ten_cong_viec }}
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
                <div class="detail-pic"><img src="" class="img" alt=""/><a
                            href="#" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>
                <div class="detail-status"><span>2 Days Ago</span></div>
            </div>
            <div class="row bottom-mrg">
                <div class="col-md-8 col-sm-8">
                    <div class="detail-desc-caption">
                        <h3>{{ $jop->ten_cong_viec }}</h3>
                        <p>{{ $thongtin->ten_doanh_nghiep }}</p>
                        <ul>
                            <li><i class="fa fa-briefcase"></i>Giá trị công việc từ:
                                <span>
                                    @php
                                        $a = json_decode($jop->gia_tri_cong_viec);
                                        echo $a[0];
                                        echo ' triệu ';
                                        echo ' - ';
                                        echo $a[1];
                                        echo ' triệu';
                                    @endphp
                                </span>
                            </li>
                            <li><i class="fa fa-briefcase"></i>Thời gian thực hiện từ :
                                <span>
                                    @php
                                        $a = json_decode($jop->thoi_gian_thuc_hien);
                                        echo $a[0];
                                        echo ' - ';
                                        echo ' đến ngày - ';
                                        echo $a[1];
                                    @endphp
                                </span>
                            </li>
                            <li><i class="fa fa-briefcase"></i>Địa điểm ưu tiên :
                                <span>
                                    {{ $jop->diadiem->name }}
                                </span>
                            </li>
                            <li><i class="fa fa-briefcase"></i>Hạn cuối ứng tuyển:
                                <span>
                                    {{ $jop->thoi_gian_bao_gia }}
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="get-touch">
                        <h4>Thông tin liên hệ</h4>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><span>{{ $thongtin->ten_doanh_nghiep }}</span></li>
                            <li><i class="fa fa-envelope"></i><span>{{ $jop->tuyendung->email }}</span></li>
                            <li><i class="fa fa-globe"></i><span>{{ $thongtin->website }}</span></li>
                            <li><i class="fa fa-phone"></i><span>{{ $thongtin->dien_thoai }}</span></li>
                            <li>
                                <i class="fa fa-money"></i><span>{{ date('d-m-Y',strtotime($jop->thoi_gian_bao_gia)) }}</span>
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
                                @foreach($seeker_cv as $seeker_cv)
                                    @if(in_array($seeker_cv->id,$jop_cv) && !in_array($jop->id, $jop_save))
                                        <a href="#" class="footer-btn grn-btn" title="">Đã ứng tuyển</a>
                                        <a href="" class="footer-btn blu-btn" id="save-jop" title="">Lưu công việc</a>
                                        <input type="text" value="{{ $jop->id }}" style="display: none;" id="jop_id">
                                        <input type="text" value="{{ Auth::user()->id }}" style="display: none;"
                                               id="user_id">
                                    @elseif(in_array($seeker_cv->id,$jop_cv) && in_array($jop->id,$jop_save))
                                        <a href="#" class="footer-btn grn-btn" title="">Đã ứng tuyển</a>
                                        <a href="#" class="footer-btn blu-btn" title="">Đã lưu công việc</a>
                                    @elseif(!in_array($seeker_cv->id,$jop_cv) && in_array($jop->id, $jop_save))
                                        <a href="" id="kiemtracv" class="footer-btn grn-btn" title="">Ứng tuyển</a>
                                        <a href="#" class="footer-btn blu-btn" title="">Đã lưu công việc</a>

                                    @else
                                        <a href="" id="kiemtracv" class="footer-btn grn-btn" title="">Ứng tuyển</a>
                                        <a href="" class="footer-btn blu-btn" id="save-jop" title="">Lưu công việc</a>
                                        <input type="text" value="{{ $jop->id }}" style="display: none;" id="jop_id">
                                        <input type="text" value="{{ Auth::user()->id }}" style="display: none;"
                                               id="user_id">

                                    @endif
                                @endforeach
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
                <h2 class="detail-title">Yêu cầu chi tiết công việc</h2>
                <ul>
                    <li>Vốn điều lệ tối thiểu: {{ $jop->von_dieu_le }} triệu đồng</li>
                    <li>Số năm kinh nghiệm tối thiểu: {{ $jop->so_nam_kinh_nghiem }} năm</li>
                    <li>Loại hình doanh nghiệp: {{ $jop->loai_hinh_doanh_nghiep }}</li>
                </ul>
                <ul>
                    <li>Yêu cầu về nhân sự tối thiểu:</li>
                    <li>
                        <ul>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nhân sự</th>
                                        <th>Số lượng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tiến sỹ</td>
                                        <td>{{ $nhansu[0] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Thạc sỹ</td>
                                        <td>{{ $nhansu[1] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Đại học</td>
                                        <td>{{ $nhansu[2] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cao đẳng</td>
                                        <td>{{ $nhansu[3] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Công nhân</td>
                                        <td>{{ $nhansu[4] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>Yêu cầu về thiết bị tối thiểu:</li>
                    <li>
                        <ul>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Tên thiết bị</th>
                                        <th>Số lượng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($b as $value)
                                        <tr>
                                            <td>{{ $value[0] }}</td>
                                            <td>{{ $value[1] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="row row-bottom">
                <h2 class="detail-title">Chi tiết công việc</h2>
                <p>{!! $jop->chi_tiet_cong_viec !!}</p>
                </ul>
            </div>
            <div class="row row-bottom">
                <h2 class="detail-title">Yêu cầu công việc</h2>
                <p>{!! $jop->yeu_cau_cong_viec !!}</p>
                </ul>
            </div>
            <div class="row row-bottom">
                <h2 class="detail-title">Phúc lợi làm việc</h2>
                <p>{!! $jop->phuc_loi_cong_viec !!}</p>
                </ul>
            </div>
            <div class="row row-bottom">
                <h2 class="detail-title">Yêu cầu hồ sơ đính kèm khi ứng tuyển</h2>
                <p>{!! $jop->yeu_cau_ho_so_dinh_kem !!}</p>
                </ul>
            </div>
            <div class="row row-bottom">
                <h2 class="detail-title">Tài liệu công việc</h2>
                <ul>
                    <li><i class="fa fa-globe"></i> File Spec:   <span><a href="{{ asset('/'.$jop->attach_spec) }}"> Download</a></span></li>
                    <li><i class="fa fa-globe"></i> File Boq:   <span><a href="{{ asset('/').$jop->attach_boq }}"> Download</a></span></li>
                    <li><i class="fa fa-globe"></i> File bản vẽ kết cấu:   <span><a href="{{ asset('/').$jop->attach_ban_ve_ket_cau }}"> Download</a></span></li>
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
                    'data': {},
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