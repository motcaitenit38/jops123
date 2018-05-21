@extends('timviec.template.app')
@section('title','Tạo mới hồ sơ ứng viên')
@section('noidung')
<form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info-timviec.store')}}" enctype="multipart/form-data" role="form" data-parsley-validate>
	@csrf
	<div class="form-group row">
		<label for="company_name" class="col-sm-3 col-form-label required">Tên hồ sơ:</label>
		<div class="col-sm-8">
			<input name="tieudehoso" type="text" class="form-control" id="company_name" placeholder="Tên hồ sơ bạn tạo" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="company_name" class="col-sm-3 col-form-label required">Họ tên:</label>
		<div class="col-sm-8">
			<input name="hoten" type="text" class="form-control" id="company_name" placeholder="Họ tên ứng viên" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="address" class="col-sm-3 col-form-label required">Điện thoại:</label>
		<div class="col-sm-8">
			<input name="dienthoai" type="text" class="form-control" id="address" placeholder="Điện thoại liên hệ ứng viên" required="">
			
		</div>
	</div>
	<div class="form-group row">
		<label for="fax" class="col-sm-3 col-form-label required">Nơi làm việc mong muốn</label>
		<div class="col-sm-8">
			<select name="diadiemlamviec" id="type_product" class="form-control js-example-basic-multiple">
				@foreach($thanhpho as $thanhpho)
				<option value="{{$thanhpho->thanhpho_id}}">{{$thanhpho->name}}</option>
				@endforeach
			</select>
			
		</div>
	</div>
	<div class="form-group row">
		<label for="fax" class="col-sm-3 col-form-label required">Vị trí làm việc mong muốn</label>
		<div class="col-sm-8">
			<select name="capbac" id="type_product" class="form-control js-example-basic-multiple">
				@foreach($capbac as $capbac)
				<option value="{{$capbac->id}}">{{$capbac->capbac}}</option>
				@endforeach
			</select>
			
		</div>
	</div>
	<div class="form-group row">
		<label for="fax" class="col-sm-3 col-form-label required">Kinh nghiệm làm việc</label>
		<div class="col-sm-8">
			<select name="kinhnghiemlamviec" id="type_product" class="form-control js-example-basic-multiple">
				@foreach($kinhnghiem as $kinhnghiem)
				<option value="{{$kinhnghiem->id}}">{{$kinhnghiem->kinhnghiem}}</option>
				@endforeach
			</select>
			
		</div>
	</div>
	<div class="form-group row">
		<label for="phone" class="col-sm-3 col-form-label required">Mức lương mong muốn</label>
		<div class="col-sm-8">
			<input name="mucluongmongmuon" type="text" class="form-control" id="phone" placeholder="Điền vào mức lương tối thiểu bạn mong muốn" required="" >
			
		</div>
	</div>	
	
	<div class="form-group row">
		<label for="fax" class="col-sm-3 col-form-label required">Ngành nghề làm việc</label>
		<div class="col-sm-8">
			<select name="nganhnghe[]" multiple="multiple" id="type_product" class="form-control js-example-basic-multiple">
				@foreach($nganhnghe as $nganhnghe)
				<option value="{{$nganhnghe->id}}">{{$nganhnghe->tennganh}}</option>
				@endforeach
			</select>
			
		</div>
	</div>
	
	<div class="form-group row">
		<label for="website" class="col-sm-3 col-form-label required">Giới thiệu ngắn về bản thân</label>
		<div class="col-sm-8">
			<textarea name="gioithieu" rows="5" class="form-control" id="description" placeholder="Mô tả nội dung trang web (~ 120 kí tự)" ></textarea>
			
		</div>
	</div>
	<div class="form-group row" >
		<label class="col-sm-3 control-label">File đính kèm CV hồ sơ</label>
		<div class="col-sm-8">
			<input name="filedinhkem" type="file" class="form-control" id="phone" >
			
		</div>
	</div>
	<div class="form-group row" style="text-align: center;">
		<div class="col-sm-9">
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