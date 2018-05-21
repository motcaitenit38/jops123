@extends('tuyendung.template.app')
@section('title','Sửa hồ sơ công ty')
@section('noidung')
<div class="col-xl-12">
  <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.update', $thongtin->id)}}" enctype="multipart/form-data" role="form">
    @method('PUT')
    @csrf
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label required">Tên công ty</label>
      <div class="col-sm-8">
        <input name="tencongty" type="text" class="form-control" id="staticEmail" placeholder="Tên công ty" required="" value="{{ $thongtin->tencongty }}" >
      </div>
    </div>    
    <div class="form-group row">
      <label for="type_product" class="col-sm-2 control-label required">Thành phố</label>
      <div class="col-sm-8">
        <select name="diachi_tp" id="type_product" class="form-control  js-example-basic-multiple">
          @foreach($diadiem_tp as $diadiem_tp)
          @if($diadiem_tp->thanhpho_id == $thongtin->diadiem_tp->thanhpho_id)
          {
          <option value="{{ $thongtin->diadiem_tp->thanhpho_id  }}" selected >{{ $thongtin->diadiem_tp->name }}</option>
          }
          @else
          <option value="{{ $diadiem_tp->thanhpho_id}}">{{ $diadiem_tp->name}}</option>
          @endif          
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-sm-2 control-label required">Địa chỉ</label>
      <div class="col-sm-8">
        <input name="diachicuthe" type="text" class="form-control" id="address" placeholder="Địa chỉ công ty" required="" value="{{ $thongtin->diachicuthe}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 control-label required">Điện thoại</label>
      <div class="col-sm-8">
        <input name="dienthoai" type="text" class="form-control" id="phone" placeholder="Điện thoại liên hệ" required="" value="{{ $thongtin->dienthoai}}">
        
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 col-form-label required">Website công ty</label>
      <div class="col-sm-8">
        <input name="website" type="text" class="form-control" id="phone" placeholder="Website công ty" required="" value={{ $thongtin->website }}>
        
      </div>
    </div>
    <div class="form-group row">
      <label for="fax" class="col-sm-2 control-label required">Ngành nghề</label>
      <div class="col-sm-8">
        <select class="js-example-basic-multiple form-control" name="nganhnghe[]" multiple="multiple" >
          @foreach($nganhnghe as $nganhnghe)
          <option value="{{ $nganhnghe->id}}" {{ array_key_exists($nganhnghe->id, $nganhnghe_user)? 'selected = "selected"' : '' }}>{{ $nganhnghe->tennganh}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="website" class="col-sm-2 control-label required">Sơ lược về công ty</label>
      <div class="col-sm-8">
        <textarea name="gioithieu" rows="5" class="form-control" id="description" placeholder="Mô tả nội dung trang web (~ 120 kí tự)" >{{ $thongtin->gioithieu }}</textarea>
        
      </div>
    </div>
    <div class="form-group row" >
      <label class="col-sm-2 control-label">Ảnh</label>
      <div class="col-sm-8">
        <input name="avata" type="file" class="form-control" id="phone" placeholder="Năm thành lập" >
        
      </div>
    </div>
    <div class="form-group rowr" style="text-align: center;">
      <div class="col-sm-8">
        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Lưu thay đổi</button>
        <a class="btn btn-warning" href="#"><i class="fa fa-reply"></i> Trở về</a>
      </div>
    </div>
  </form>
</div>
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