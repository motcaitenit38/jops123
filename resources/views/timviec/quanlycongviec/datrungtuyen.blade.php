@extends('timviec.template.app')
@section('title','Danh sách công việc đã trúng tuyển')
@section('content')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="chat_container">
                    @foreach($jobs as $jop)
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-1 col-sm-2 small-padding">
                                    <div class="brows-job-company-img">
                                        <img src="assets/img/com-1.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-5">
                                    <div class="brows-job-position">
                                        <h3><a href="{{route('home.detail',$jop->id)}}">{{ $jop->ten_cong_viec }}</a></h3>
                                        <p><span class="brows-job-status"><strong>Ngày đăng:</strong> {{ date('d-m-Y', strtotime($jop->created_at)) }}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker">Hạn nộp hồ sơ:</i>{{ date('d-m-Y', strtotime($jop->thoi_gian_bao_gia)) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="job-action">
                                        <a href="{{route('home.detail',$jop->id)}}"
                                           target="_blank" id="modelchitiet" type="button" class="btn btn-warning">Chi tiết công việc</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                @endforeach

                <!--row Pagination-->
                {{--<div class="row">--}}
                {{--<ul class="pagination">--}}
                {{--{!! $jobs->links() !!}--}}
                {{--</ul>--}}
                {{--</div>--}}
                <!--./row Pagination-->
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>

@endsection