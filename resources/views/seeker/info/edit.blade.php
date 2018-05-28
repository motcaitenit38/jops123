@extends('seeker.template.app')
@section('title','Danh sách công việc đã lưu')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info-seeker.update', $info->id) }}"
          enctype="multipart/form-data" role="form">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Họ tên</label>
            <div class="col-sm-8">
                <input name="name" type="text" class="form-control" id="name" placeholder="Họ tên" value="{{ $info->name }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-8">
                <input name="email" type="text" class="form-control" id="email" placeholder="email" value="{{ $info->email }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
                <input name="phone" type="text" class="form-control" id="phone" placeholder="số điện thoại"
                       value="{{ $info->phone_number }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                <input name="address" type="text" class="form-control" id="address"
                       placeholder="Địa chỉ" value="{{ $info->address }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="avatar" class="col-sm-3 col-form-label">Ảnh đại diện</label>
            <div class="col-sm-8">
                <input name="avatar" type="file" class="form-control" id="avatar" placeholder="Ảnh đại diện"
                       value="{{ old('avatar') }}" />
            </div>
        </div>
        <div class="form-group row">
            <label for="dangtin" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="form-control btn btn-success" id="company_name">Cập nhật thông tin</button>
            </div>
        </div>
    </form>

@endsection