@extends('employer.template.app')
@section('title','Cập nhật thông tin công ty')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.store') }}" enctype="multipart/form-data" role="form">
        @csrf
        <div class="form-group row">
            <label for="company_name" class="col-sm-3 col-form-label">Tên công ty</label>
            <div class="col-sm-8">
                <input name="company_name" type="text" class="form-control" id="company_name" placeholder="Tên công ty" value="{{ old('company_name') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                <select name="address" id="address" class="form-control">
                    @foreach($address as $address)
                        <option value="{{ $address->thanhpho_id }}"
                                @if(old('$address') == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Tên công ty</label>
            <div class="col-sm-8">
                <input name="phone" type="text" class="form-control" id="phone" placeholder="số điện thoại" value="{{ old('phone') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-3 col-form-label">Tên công ty</label>
            <div class="col-sm-8">
                <input name="website" type="text" class="form-control" id="website" placeholder="Địa chỉ website công ty" value="{{ old('website') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="logo" class="col-sm-3 col-form-label">Logo công ty</label>
            <div class="col-sm-8">
                <input name="logo" type="file" class="form-control" id="logo" placeholder="Logo công ty" value="{{ old('logo') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="cover" class="col-sm-3 col-form-label">Cover công ty</label>
            <div class="col-sm-8">
                <input name="cover" type="file" class="form-control" id="cover" placeholder="cover công ty" value="{{ old('cover') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Giới thiệu về công ty</label>
            <div class="col-sm-8">
                <textarea name="description" type="text" class="form-control" id="description"
                          placeholder="Giới thiệu về công ty" value="{{ old('description') }}" rows="6" required>
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="dangtin" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="form-control btn btn-success" id="company_name">Đăng tin</button>
            </div>
        </div>
    </form>
@endsection