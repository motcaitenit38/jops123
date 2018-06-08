@extends('search.template.app')
@section('title')
    Danh sách nhà tuyển dụng
@endsection
@section('content')
    <div class="clearfix"></div>
    <section class="inner-header-title">
        <div class="container">
            <h1>Danh sách nhà tuyển dụng</h1></div>
    </section>
    <div class="clearfix"></div>
    <section class="member-card gray">
        <div class="container">
            <div class="row">
            @foreach($danhsach as $danhsach)
                <div class="col-md-4 col-sm-4">
                    <div class="manage-cndt">
                        {{--<div class="cndt-status pending">Pending</div>--}}
                        <div class="cndt-caption">
                            <div class="cndt-pic"><img src="img/can-1.png" class="img-responsive" alt=""/></div>
                            <h4>{{ $danhsach->ten_doanh_nghiep }}</h4><span>{{$danhsach->Address->name}}</span>
                            <p>Năm thành lập: <strong>{{ $danhsach->nam_thanh_lap }}</strong></p>
                        </div>
                        <a href="{{ route('index.congtytuyendung', $danhsach->id) }}" title="" class="cndt-profile-btn">Xem chi tiết</a></div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
        </div>
    </section>
@endsection
@section('script')


@endsection