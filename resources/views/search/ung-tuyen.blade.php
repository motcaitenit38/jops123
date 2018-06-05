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
    <form action="{{ route('truongdz') }}" method="post" enctype="multipart/form-data" id="dmajax">
        @csrf
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
                            <ul class="col-md-12">
                                <h4>Chọn CV gửi cho nhà tuyển dụng </h4>
                            </ul>
                            <ul class="col-md-12" style="padding-top: 20px">
                                <div class="form-group row">
                                    <label for="cv" class="col-sm-3 col-form-label">Chọn CV phù hợp</label>
                                    <div class="col-sm-9">
                                        <select name="cv_id" id="cv_id" class="form-control">
                                            @foreach($cv as $cv)
                                                <option value="{{ $cv->id }}"
                                                        @if(old('cv') == $cv->id) selected @endif>{{ $cv->ten_cv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cv" class="col-sm-3 col-form-label">Đính kèm file yêu cầu</label>
                                    <div class="col-sm-9">
                                        <input id="filedinhkem" type="file" name="filedinhkem">
                                        <label for="cv" class="col-sm-12 col-form-label">Nén tất cả file yêu cầu thành
                                            file
                                            Zip hoặc Rar, trừ file thông tin công ty đã có trên hệ thống khi giới thiệu
                                            công
                                            ty</label>
                                        @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                <p style="color:red;" class="error errorname">{{ $error }}</p>
                                                    @endforeach

                                        @endif

                                    </div>

                                </div>
                            </ul>
                            <input type="hidden" id="job_id" name="job_id" value="{{ $jop->id }}">
                            <div class="col-md-12 col-sm-12">
                                <div class="detail-pannel-footer-btn text-center">
                                    <input type="submit" href="#" class="footer-btn grn-btn btn-block" title="">Gửi CV ứng tuyển</input>
                                </div>
                            </div>
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
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('script')
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('#ungtuyen').click(function (e) {--}}
                {{--e.preventDefault();--}}
                {{--alert($('#filedinhkem').get(0).files[0]);--}}
                {{--// var cv_id = $('#cv_id').val();--}}
                {{--// var job_id = $('#job_id').val();--}}
                {{--// var file_data = $('#filedinhkem').prop('files')[0];--}}
                {{--// var form_data = new FormData();--}}
                {{--// form_data.append('filedinhkem', file_data);--}}
                {{--// form_data.append('cv_id', cv_id);--}}
                {{--// form_data.append('job_id', job_id);--}}
                {{--$.ajaxSetup({--}}
                    {{--headers: {--}}
                        {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                    {{--}--}}
                {{--});--}}
                {{--$.ajax({--}}
                    {{--'url': '{{ route('truongdz') }}',--}}
                    {{--data: {--}}
                        {{--'cv_id' : $('#cv_id').val(),--}}
                        {{--'job_id' : $('#job_id').val(),--}}
                        {{--'filedinhkem' : $('#filedinhkem').get(0).files[0]--}}
                    {{--},--}}
                    {{--processData: false,--}}
                    {{--contentType: false,--}}
                    {{--cache: false,--}}
                    {{--'type': 'POST',--}}
                    {{--success: function (data) {--}}
                        {{--console.log(data);--}}
                        {{--if (data.error == true) {--}}
                            {{--$('.error').hide();--}}
                            {{--if (data.message.filedinhkem != undefined) {--}}
                                {{--$('.errorname').show().text(data.message.filedinhkem[0]);--}}
                            {{--}--}}
                        {{--}--}}
                        {{--else {--}}
                            {{--alert('Bạn đã gửi CV ứng tuyển thành công');--}}
                            {{--window.location.href = "{{ route('timviec.index') }}"--}}
                        {{--}--}}
                    {{--}--}}

                {{--});--}}
            {{--})--}}
        {{--});--}}
    {{--</script>--}}
    <script type="text/javascript">
        var allEditors = document.querySelectorAll('#editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }
    </script>
@endsection