@extends('tuyendung.template.app')
@section('title','Thông tin công ty')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.store') }}"
          enctype="multipart/form-data" role="form">
        @csrf
        <div class="form-group row">
            <label for="ten_doanh_nghiep" class="col-sm-3 col-form-label">Tên công ty</label>
            <div class="col-sm-8">
                {{ $info->ten_doanh_nghiep }}
            </div>
        </div>
        <div class="form-group row">
            <label for="dien_thoai" class="col-sm-3 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
                {{ $info->dien_thoai }}
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-3 col-form-label">Địa chỉ website công ty</label>
            <div class="col-sm-8">
                {{ $info->website }}
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_id" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                {{ $info->Address->name }}
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_cuthe" class="col-sm-3 col-form-label">Địa chỉ cụ thể</label>
            <div class="col-sm-8">
                {{ $info->dia_diem_cuthe }}
            </div>
        </div>
        <div class="form-group row">
            <label for="ma_so_thue" class="col-sm-3 col-form-label">Mã số thuế</label>
            <div class="col-sm-8">
                {{ $info->ma_so_thue }}
            </div>
        </div>
        <div class="form-group row">
            <label for="von_dieu_le" class="col-sm-3 col-form-label">Vốn điều lệ</label>
            <div class="col-sm-8">
                {{ $info->von_dieu_le }}
            </div>
        </div>
        <div class="form-group row">
            <label for="nam_thanh_lap" class="col-sm-3 col-form-label">năm thành lập</label>
            <div class="col-sm-8">
                {{ $info->nam_thanh_lap }}
            </div>
        </div>
        <div class="form-group row">
            <label for="loai_hinh_doanh_nghiep" class="col-sm-3 col-form-label">Loại hình doanh nghiệp</label>
            <div class="col-sm-8">
                {{ $info->loai_hinh_doanh_nghiep }}
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Giới thiệu</label>
            <div class="col-sm-8">
                {{ $info->gioi_thieu_cong_ty }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <a href="{{ asset('tuyendung/info/'.$info->id.'/edit') }}" >
                    <span class="btn btn-default btn-file btn-block">	edit </span></a>
            </div>
        </div>
    </form>
@endsection