@extends('tuyendung.layouts.template')
@section('noidung')

{{-- @foreach($info as $info) --}}

<div class="container">
    <h2 class="text-center"><span class="badge badge-info">Thông tin công ty</span></h2>
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <h4 class="text-center">Hình đại diện</h4 class="text-center">
            <div class="avata">
                <img class="img-fluid" src="https://startbootstrap.com/assets/img/templates/creative.jpg">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-right">Tên công ty:</div>
                </div>
                <div class="col-md-6">
                    <div class="ten">
                        {!! $info->tencongty !!}
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-right">Điện thoại:</div>
                </div>
                <div class="col-md-6">
                    <div class="ten">
                        {{ $info->dienthoai}}
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-right">Năm thành lập:</div>
                </div>
                <div class="col-md-6">
                    <div class="ten">
                        {{ $info->namthanhlap}}
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-right">Quy mô:</div>
                </div>
                <div class="col-md-6">
                    <div class="ten">
                        {{ $info->quymo->giatri }}
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-right">Ngành hoạt động:</div>
                </div>
                <div class="col-md-6">
                    <div class="ten">
                        @foreach($info->nganhnghe as $abc)
                        {{ $abc->tennganh }}
                        @endforeach
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-right">Giới thiệu:</div>
                </div>
                <div class="col-md-6">
                    <div class="ten">
                        {{ $info->gioithieu}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <a href="{{ asset('tuyendung/info/'.$info->id.'/edit') }}" class="btn btn-warning">Sửa thông tin</a>
        </div>
    </div>
</div>
{{-- @endforeach --}}
@endsection
@section('script')
@endsection