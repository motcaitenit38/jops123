@extends('tuyendung.template.app')
@section('title','Danh sách ứng viên');
@section('content')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="chat_container">
                    @foreach($danhsach as $danhsach)
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-1 col-sm-2 small-padding">
                                    <div class="brows-job-company-img">
                                        <img src="assets/img/com-1.jpg" class="img-responsive" alt=""/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-5">
                                    <div class="brows-job-position">
                                        <h3><a href="{{ url('tuyendung/chitietungvien/'.$danhsach->id.'/'.$id_job) }}" target="_blank" id="modelchitiet" >{{ $danhsach->ten_cv }}</a>
                                        </h3>
                                        <p>
                                            <span class="brows-job-status"><strong>Ngành:</strong> {{$danhsach->nganh->ten_nganh}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="brows-job-location">
                                        <p>
                                            <i class="fa fa-map-marker">Ngày ứng
                                                tuyển:</i>{{ date('d-m-Y', strtotime($danhsach->created_at)) }}
                                        </p>
                                        <p>
                                            <a href="{{ url('tuyendung/chitietungvien/'.$danhsach->id.'/'.$id_job) }}" target="_blank" id="modelchitiet" type="button" class="btn btn-warning">Chi tiết
                                                hồ sơ</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="job-action">
                                        <p><a class="btn btn-success edit"
                                              href="{{ asset('tuyendung/job/'.$danhsach->id.'/edit') }}"
                                              title="Edit"
                                              type="button">Chấp nhận</a></p>
                                        <p><a class="btn btn-danger edit"
                                              href="{{ asset('tuyendung/job/'.$danhsach->id.'/edit') }}"
                                              title="Edit"
                                              type="button">Từ chối</a></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                @endforeach



                <!--row Pagination-->
                {{--<div class="row">--}}
                {{--<ul class="pagination">--}}
                {{--{!! $danhsach->links() !!}--}}
                {{--</ul>--}}
                {{--</div>--}}
                <!--./row Pagination-->
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    {{--model--}}
    <!-- Trigger the modal with a button -->


@endsection