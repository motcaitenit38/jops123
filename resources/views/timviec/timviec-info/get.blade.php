@extends('timviec.template.app')
@section('title','trang hồ sơ cá nhân')
@section('noidung')
<h2 class="text-center"><span class="badge badge-info">Thông tin công ty: {!! $info->tencongty !!}</span></h2>
<div class="row justify-content-md-center">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<div class="avata text-center">
			<img class="img-fluid img-responsive" src="{{ asset($info->avata) }}">
		</div>
	</div>
	
	<div class="col-md-6 col-md-offset-3" style="margin-bottom: 20px;">
		<div class="row" style="margin-bottom: 20px;">
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
		<div class="row" style="margin-bottom: 20px;">
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
				<div class="text-right">Website:</div>
			</div>
			<div class="col-md-6">
				<div class="ten">
					{{ $info->website }}
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
		<a href="{{ asset('timviec/info-timviec/'.$info->id.'/edit') }}" class="btn btn-warning">Sửa thông tin</a>
	</div>
</div>
@endsection