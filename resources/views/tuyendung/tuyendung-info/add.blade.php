@extends('tuyendung.template.app')
@section('title','Cập nhật hồ sơ công ty')
@section('noidung')
<form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.store')}}" enctype="multipart/form-data" role="form" data-parsley-validate>
  @csrf
  <div class="form-group row">
    <label for="company_name" class="col-sm-2 col-form-label required">Tên công ty</label>
    <div class="col-sm-8">
      <input name="tencongty" type="text" class="form-control" id="company_name" placeholder="Tên công ty" required Minlength ="5" value="{{ old('tencongty') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="type_product" class="col-sm-2 col-form-label required">Địa chỉ</label>
    <div class="col-sm-8">
      <select name="diachi_tp" id="type_product" class="form-control">
        @foreach($thanhpho as $thanhpho)
        <option value="{{ $thanhpho->thanhpho_id }}" @if(old('thanhpho') == $thanhpho->thanhpho_id) selected @endif>{{ $thanhpho->name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label required">Địa chỉ cụ thể</label>
    <div class="col-sm-8">
      <input name="diachicuthe" type="text" class="form-control" id="address" placeholder="Địa chỉ công ty" required="" value="{{ old('diachi') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label required">Điện thoại</label>
    <div class="col-sm-8">
      <input name="dienthoai" type="text" class="form-control" id="phone" placeholder="Điện thoại liên hệ" required=""  value="{{ old('dienthoai') }}" >
      
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label required">Website công ty</label>
    <div class="col-sm-8">
      <input name="website" type="text" class="form-control" id="phone" placeholder="Website công ty" required="" value="{{ old('website') }}" >
      
    </div>
  </div>
  <div class="form-group row">
    <label for="fax" class="col-sm-2 col-form-label required">Ngành nghề</label>
    <div class="col-sm-8">
      <select name="nganhnghe[]" multiple="multiple" id="type_product" class="form-control js-example-basic-multiple">
        @foreach($nganhnghe as $nganhnghe)
        <option value="{{ $nganhnghe->id }}" @if(old('nganhnghe') == $nganhnghe->id) selected @endif>{{$nganhnghe->tennganh}}</option>
        @endforeach
      </select>
      
    </div>
  </div>
  
  <div class="form-group row">
    <label for="website" class="col-sm-2 col-form-label required">Giới thiệu về công ty</label>
    <div class="col-sm-8">
      <textarea name="gioithieu" rows="7" class="form-control" id="description" placeholder="Giới thiệu về công ty " >{{ old('gioithieu') }}</textarea>
      
    </div>
  </div>
  <div class="form-group row" >
    <label class="col-sm-2 control-label">Ảnh</label>
    <div class="col-sm-8">
      <input name="avata" type="file" class="form-control" id="phone" >
      
    </div>
  </div>
  <div class="form-group row" style="text-align: center;">
    <div class="col-sm-8 col-sm-offset-1">
      <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Lưu thay đổi</button>
      <a class="btn btn-warning" href="#"><i class="fa fa-reply"></i> Trở về</a>
    </div>
  </div>
</form>
<!--END #main-->
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
$('.js-example-basic-multiple').select2({
language: "vi",
placeholder: 'Chọn ngành nghề của công ty',
maximumSelectionLength: 5,
allowClear: true
});
});
</script>
@endsection