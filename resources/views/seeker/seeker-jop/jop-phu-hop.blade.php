@extends('seeker.template.app')
@section('title','Danh sách công việc phù hợp')
@section('content')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="chat_container">
                    @foreach($congviec as $jop)
                        <article>
                            <a href="{{ url('jop/'.$jop->id) }}" target="_blank">
                                <div class="brows-job-list">
                                    <div class="col-md-1 col-sm-2 small-padding">
                                        <div class="brows-job-company-img">
                                            <img src="{{ asset($jop->employer_info->logo) }}" class="img-responsive"
                                                 alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-5">
                                        <div class="brows-job-position">
                                            <h3>{{ $jop->jop_name }}</h3>
                                            <p>
                                                <span class="brows-job-status"><strong>Ngày đăng:</strong> {{ date('d-m-Y', strtotime($jop->created_at)) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="brows-job-location">
                                            <p><i class="fa fa-map-marker">Hạn nộp hồ
                                                    sơ:</i>{{ date('d-m-Y', strtotime($jop->deadline)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
@endsection