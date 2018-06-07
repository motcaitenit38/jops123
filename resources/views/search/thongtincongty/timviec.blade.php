@extends('search.template.app')
@section('title')
    Chi tiết việc {{ $thongtin->ten_doanh_nghiep }}
@endsection
@section('content')
    <div class="clearfix"></div>
    <section class="inner-header-title">
        <div class="container">
            <h1>Thông tin công ty</h1></div>
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
                        <h3>{{ $thongtin->ten_doanh_nghiep }}</h3>
                        <p>{{ $thongtin->Address->name }}</p>
                        <p>Loại hình doanh nghiệp: {{ $thongtin->loai_hinh_doanh_nghiep }}</p>
                        <p>Mã số thuế: {{ $thongtin->ma_so_thue }}</p>
                        <p>Vố điều lệ: {{ $thongtin->von_dieu_le }}</p>

                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="get-touch">
                        <h4>Thông tin liên hệ</h4>
                        <ul>
                            <li><i class="fa fa-envelope"></i>Email<span>{{ $thongtin->email }}</span></li>
                            <li><i class="fa fa-globe"></i>Website<span>{{ $thongtin->website }}</span></li>
                            <li><i class="fa fa-phone"></i><span>{{ $thongtin->dien_thoai }}</span></li>
                            <li>
                                <i class="fa fa-money"></i><span>{{ date('d-m-Y',strtotime($thongtin->nam_thanh_lap)) }}</span>
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
                            @if(!Auth::guard('employer')->check())
                                <a href="{{ url('tuyendung/login') }}" class="footer-btn blu-btn" title="" >Đăng nhập để quan tâm ứng viên
                               </a>
                            @else
                                @if(empty($allquantam))
                                    <a href="" class="footer-btn blu-btn save-congty" id="save-jop" title="">Quan tâm ứng viên
                                    <input class="idthongtin" type="text" value="{{ $thongtin->id }}" style="display: none;"></a>
                                @else
                                    @if(in_array($thongtin->id, $allquantam))
                                        <a href="#" class="footer-btn grn-btn" title="">Bạn đã quan tâm ứng viên</a>
                                    @else
                                        <a href="" class="footer-btn blu-btn save-congty" id="save-jop" title="">Quan tâm ứng
                                            viên
                                        <input type="text" class="idthongtin" value="{{ $thongtin->id }}" style="display: none;"></a>
                                    @endif
                                @endif
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
                <h2 class="detail-title">Giới thiệu về công ty</h2>
                <p>{!! $thongtin->gioi_thieu_cong_ty !!}</p>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function () {
            $('.save-congty').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ route('tuyendung.luucongty') }}',
                    'data': {
                        'id_thongtin': $(this).find('.idthongtin').val()
                    },
                    'type': 'POST',
                    success: function (data) {
                        alert('Bạn đã quan tâm thông tin này thành công');
                        // alert(data.message);
                        location.reload();
                    },
                    error: function (data) {
                        // alert(data.message);
                        // alert('loi');
                    }

                });
            });
        });
    </script>

@endsection