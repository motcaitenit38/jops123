@extends('tuyendung.layouts.template')
@section('noidung')
<form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.store')}}" enctype="multipart/form-data" role="form">
  @csrf
  <div class="form-group row">
    <label for="company_name" class="col-sm-2 col-form-label required">Tên công ty</label>
    <div class="col-sm-4">
      <input name="tencongty" type="text" class="form-control" id="company_name" placeholder="Tên công ty" required="" >
      @if ($errors->has('tencongty'))
      <div class="alert alert-danger" role="alert">
        {{ $errors->first('tencongty') }}
      </div>
      @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="type_product" class="col-sm-2 col-form-label required">Quy mô công ty</label>
    <div class="col-sm-4">
      <select name="quymo" id="type_product" class="form-control js-example-basic-multiple">
        @foreach($quymo as $quymo)
        <option value="{{ $quymo->id}}">{{ $quymo->giatri}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label required">Địa chỉ</label>
    <div class="col-sm-4">
      <input name="diachi" type="text" class="form-control" id="address" placeholder="Địa chỉ công ty" required="">
      @if ($errors->has('diachi'))
      <div class="alert alert-danger" role="alert">
        {{ $errors->first('diachi') }}
      </div>
      @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label required">Điện thoại</label>
    <div class="col-sm-4">
      <input name="dienthoai" type="text" class="form-control" id="phone" placeholder="Điện thoại liên hệ" required="" >
      @if ($errors->has('dienthoai'))
      <div class="alert alert-danger" role="alert">
        {{ $errors->first('dienthoai') }}
      </div>
      @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label required">Năm thành lập</label>
    <div class="col-sm-4">
      <input name="namthanhlap" type="text" class="form-control" id="phone" placeholder="Năm thành lập" required="" >
      @if ($errors->has('namthanhlap'))
      <div class="alert alert-danger" role="alert">
        {{ $errors->first('namthanhlap') }}
      </div>
      @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="fax" class="col-sm-2 col-form-label required">Ngành nghề</label>
    <div class="col-sm-8">
      <select name="nganhnghe[]" multiple="multiple" id="type_product" class="form-control js-example-basic-multiple">
        @foreach($nganhnghe as $nganhnghe)
        <option value="{{$nganhnghe->id}}">{{$nganhnghe->tennganh}}</option>
        @endforeach
      </select>
      @if ($errors->has('nganhnghe'))
      <div class="alert alert-danger" role="alert">
        {{ $errors->first('nganhnghe') }}
      </div>
      @endif
    </div>
  </div>
  
  <div class="form-group row">
    <label for="website" class="col-sm-2 col-form-label required">Sơ lược về công ty</label>
    <div class="col-sm-8">
      <textarea name="gioithieu" rows="5" class="form-control" id="description" placeholder="Mô tả nội dung trang web (~ 120 kí tự)" ></textarea>
      @if ($errors->has('gioithieu'))
      <div class="alert alert-danger" role="alert">
        {{ $errors->first('gioithieu') }}
      </div>
      @endif
    </div>
  </div>
  <div class="form-group row" >
    <label class="col-sm-2 control-label">Ảnh</label>
    <div class="col-sm-4">
      <input name="avata" type="file" class="form-control" id="phone" >
    </div>
  </div>
  <div class="form-group row" style="text-align: center;">
    <div class="col-sm-8">
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
$('.js-example-basic-multiple').select2();
});
</script>
</script>
@endsection