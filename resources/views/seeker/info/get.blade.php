@extends('seeker.template.app')
@section('title','Danh sách công việc đã lưu')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="add-job_container">
                <div class="job-box">
                    <div class="row no-ext-mrg sm-plix">
                        <div class="col-sm-6 col-sm-8 col-sm-offset-2 col-md-offset-3">
                            <div class="main-profile-detail">
                                <img src="{{ asset('/'.$info->avatar)  }}" alt="" class="img-circle img-responsive">
                                <h5><Strong>Họ tên: </Strong>{{ $info->name }}</h5>
                                <h5><Strong>Điện thoại: </Strong>{{ $info->phone }}</h5>
                                <h5><Strong>Email: </Strong>{{ $info->email }}</h5>
                                <h5><Strong>địa chỉ: </Strong>{{ $info->address }}</h5>
                                <a href="{{ asset('seeker/info-seeker/'.$info->id.'/edit') }}" >
                                    <span class="btn btn-default btn-file">	edit </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->

@endsection