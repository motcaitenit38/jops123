@extends('tuyendung.layouts.template')
@section('noidung')
@foreach($thongtin as $thongtin)
<div class="col-xl-12">
  <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.update', $thongtin->id)}}" enctype="multipart/form-data" role="form">
    @method('PUT')
    @csrf
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label required">Tên công ty</label>
      <div class="col-sm-4">
        <input name="tencongty" type="text" class="form-control" id="staticEmail" placeholder="Tên công ty" required="" value="{{ $thongtin->tencongty }}" >
        
        @if ($errors->has('tencongty'))
        <div class="alert alert-danger" role="alert">
          {{ $errors->first('tencongty') }}
        </div>
        @endif
        
      </div>
    </div>
    <div class="form-group row">
      <label for="type_product" class="col-sm-2 control-label required">Quy mô công ty</label>
      <div class="col-sm-4">
        <select name="quymo" id="type_product" class="form-control js-example-basic-multiple">
          @foreach($quymo as $quymo)
          @if($quymo->id == $thongtin->quymo->id)
          {
          <option value="{{ $thongtin->quymo->id}}" selected="selected">{{ $thongtin->quymo->giatri }}</option>
          }
          @else
          <option value="{{ $quymo->id}}">{{ $quymo->giatri}}</option>
          @endif
          
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-sm-2 control-label required">Địa chỉ</label>
      <div class="col-sm-4">
        <input name="diachi" type="text" class="form-control" id="address" placeholder="Địa chỉ công ty" required="" value="{{ $thongtin->diachi}}">
        @if ($errors->has('diachi'))
        <div class="alert alert-danger" role="alert">
          {{ $errors->first('diachi') }}
        </div>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 control-label required">Điện thoại</label>
      <div class="col-sm-4">
        <input name="dienthoai" type="text" class="form-control" id="phone" placeholder="Điện thoại liên hệ" required="" value="{{ $thongtin->dienthoai}}">
        @if ($errors->has('dienthoai'))
        <div class="alert alert-danger" role="alert">
          {{ $errors->first('dienthoai') }}
        </div>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 control-label required">Năm thành lập</label>
      <div class="col-sm-4">
        <input name="namthanhlap" type="text" class="form-control" id="phone" placeholder="Năm thành lập" required="" value="{{ $thongtin->namthanhlap}}" >
        @if ($errors->has('namthanhlap'))
        <div class="alert alert-danger" role="alert">
          {{ $errors->first('namthanhlap') }}
        </div>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="fax" class="col-sm-2 control-label required">Ngành nghề</label>
      <div class="col-sm-8">
        <select name="nganhnghe[]" id="multiple" multiple>
          {{-- lặp danh sách ngành nghề của user cần sửa --}}
        @foreach($thongtin->nganhnghe as $nganhnghesua)
            {{-- lặp danh sách ngành nghề có trong bảng ngành nghề --}}
          @foreach($nganhnghe as $danhsachnganh)
            
              {{-- in ra các option, nếu id ngành nghề có trong user trùng với id trong bảng ngành nghề
                thì cho nó selected
                --}}
            <option value="{{ $danhsachnganh->id}}" {{ ($danhsachnganh->id == $nganhnghesua->id) ? 'selected="selected"' : "" }}>{{ $danhsachnganh->tennganh}}</option>
              
          @endforeach

        @endforeach

        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="website" class="col-sm-2 control-label required">Sơ lược về công ty</label>
      <div class="col-sm-8">
        <textarea name="gioithieu" rows="5" class="form-control" id="description" placeholder="Mô tả nội dung trang web (~ 120 kí tự)" >{{ $thongtin->gioithieu }}</textarea>
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


@endforeach


@endsection
@section('script')
<script type="text/javascript">
$( document ).ready(function() {
    new SlimSelect({
  select: '#multiple'
})
});
</script>
@endsection