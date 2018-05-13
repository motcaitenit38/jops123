  @extends('tuyendung.layouts.template')

  @section('noidung')

  <div id="main">

    <div class="col-xs-12">
      <div class="alert alert-info">
        <strong>Info!</strong>Thông tin công ty.
      </div>
      <form id="post-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('tuyendung.addinfo.submit')}}" enctype="multipart/form-data" role="form">
        @csrf
        <div class="form-group">
          <label for="company_name" class="col-sm-4 control-label required">Tên công ty</label>
          <div class="col-md-6 col-sm-8">
            <input name="tencongty" type="text" class="form-control" id="company_name" placeholder="Tên công ty" required="" >
          </div>
        </div>
        <div class="form-group">
          <label for="type_product" class="col-sm-4 control-label required">Quy mô công ty</label>
          <div class="col-md-6 col-sm-8">
            <select name="quymo" id="type_product" class="form-control js-example-basic-multiple">
              @foreach($quymo as $quymo)
              <option value="{{ $quymo->id}}">{{ $quymo->giatri}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-4 control-label required">Địa chỉ</label>
          <div class="col-md-6 col-sm-8">
            <input name="diachi" type="text" class="form-control" id="address" placeholder="Địa chỉ công ty" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-4 control-label required">Điện thoại</label>
          <div class="col-md-6 col-sm-8">
            <input name="dienthoai" type="text" class="form-control" id="phone" placeholder="Điện thoại liên hệ" required="" >
          </div>
        </div>
        <div class="form-group">
          <label for="fax" class="col-sm-4 control-label required">Ngành nghề</label>
          <div class="col-md-6 col-sm-8">
            <select name="nganhnghe[]" multiple="multiple" id="type_product" class="form-control js-example-basic-multiple">
              @foreach($nganhnghe as $nganhnghe)
              <option value="{{$nganhnghe->id}}">{{$nganhnghe->tennganh}}</option>
              @endforeach
            </select>
          </div>
        </div> 
        <div class="form-group">
          <label for="phone" class="col-sm-4 control-label required">Năm thành lập</label>
          <div class="col-md-6 col-sm-8">
            <input name="namthanhlap" type="text" class="form-control" id="phone" placeholder="Năm thành lập" required="" >
          </div>
        </div>       
        <div class="form-group">
          <label for="website" class="col-sm-4 control-label required">Sơ lược về công ty</label>
          <div class="col-md-6 col-sm-8">
            <textarea name="gioithieu" rows="5" class="form-control" id="description" placeholder="Mô tả nội dung trang web (~ 120 kí tự)" ></textarea>
          </div>
        </div>
        <div class="form-group" >
          <label class="col-sm-4 control-label">Ảnh</label>
          <div class="col-md-6 col-sm-8">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#img-file" role="tab" data-toggle="tab">Upload từ máy tính</a></li>
              <li><a href="#img-url" role="tab" data-toggle="tab">Lấy từ URL</a></li>
            </ul>
            <div class="tab-content" style="margin-top: 15px;">
              <div class="tab-pane active" id="img-file">
                <label for="image" class="col-sm-4 control-label">Từ máy tính</label>
                <div class="col-sm-8">
                  <input name="image" type="file" class="form-control" id="image" accept="image/*">
                </div>
              </div>
              <div class="tab-pane" id="img-url">
                <label for="url" class="col-sm-4 control-label"> Từ URL</label>
                <div class="col-sm-8">
                  <input name="image" type="text" value="" class="form-control" id="url" placeholder="Đường dẫn tới hình ảnh" maxlength="255">
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Lưu thay đổi</button>
            <a class="btn btn-warning" href="#"><i class="fa fa-reply"></i> Trở về</a>
          </div>
        </div>
               
      </div>
    </form>
  </div>
</div>
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
