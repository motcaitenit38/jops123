@extends('employer.template.app')
@section('title','Thông tin công ty')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="add-job_container">
                <div class="job-box">
                    <div class="row no-ext-mrg sm-plix">
                        <div class="col-sm-6 col-sm-8 col-sm-offset-2 col-md-offset-3">
                            <div class="main-profile-detail">
                                <img src="{{ asset('/'.$info->logo)  }}" alt="" class="img-circle img-responsive">
                                <h4>{{ $info->company_name }}</h4>
                                <span class="designation"><strong>Phone: </strong>{{ $info->phone }} - </span>
                                <span class="mail"><strong>Website: </strong>{{ $info->website }}</span>
                                <h5><Strong>Địa chỉ: </Strong>{{ $info->address_info->name }}</h5>
                                <a href="{{ asset('employer/info/'.$info->id.'/edit') }}" >
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