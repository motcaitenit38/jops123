@extends('tuyendung.template.app')
@section('title','Sửa công việc')
@section('noidung')
<form id="post-form" class="form-group col-md-12" method="post" action="{{ route('post.update', $congviec->id)}}" enctype="multipart/form-data" role="form">
	 @method('PUT')
	@csrf
	<div class="form-group row">
		<label for="tencongviec" class="col-sm-2 col-form-label">Tên công việc</label>
		<div class="col-sm-9">
			<input name="tencongviec" type="text" class="form-control" id="company_name" placeholder="Tên công việc" value="{{ $congviec->tencongviec }}" />
		</div>
	</div>
	<div class="form-group row">
		<label for="diadiem" class="col-sm-2 col-form-label">Nơi làm việc</label>
		<div class="col-sm-3">
			<select name="thanhpho" id="thanhpho" class="form-control">
				@foreach($thanhpho as $thanhpho)
				<option value="{{ $thanhpho->thanhpho_id }}" @if($congviec->noilamviec == $thanhpho->thanhpho_id) selected @endif>{{ $thanhpho->name }}</option>
				@endforeach
			</select>
		</div>
		
	</div>
	<div class="form-group row">
		<label for="diachicuthe" class="col-sm-2 col-form-label">Địa chỉ cụ thể</label>
		<div class="col-sm-9">
			
			<input name="diachicuthe" type="text" class="form-control" id="diachi" placeholder="Địa chỉ" value="{{ $congviec->diachi }}" />
			<label for="exampleInputEmail1">Địa chỉ cụ thể nơi làm việc</label>
		</div>
		
	</div>
	<div class="form-group row">
		<label for="capbac" class="col-sm-2 col-form-label">Cấp bậc</label>
		<div class="col-sm-9">
			<select name="capbac" id="capbac" class="form-control">
				@foreach($capbac as $capbac)
				<option value="{{ $capbac->id }}" @if($congviec->capbac_id == $capbac->id) selected @endif>{{ $capbac->capbac }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="kinhnghiem" class="col-sm-2 col-form-label">Kinh nghiệm</label>
		<div class="col-sm-9">
			<select name="kinhnghiem" id="capbac" class="form-control">
				@foreach($kinhnghiem as $kinhnghiem)
				<option value="{{ $kinhnghiem->id }}" @if($congviec->kinhnghiem_id == $kinhnghiem->id) selected @endif>{{ $kinhnghiem->kinhnghiem }}</option>
				@endforeach
			</select>
		</div>
	</div>
	
	{{-- Mức lương --}}
	<div class="form-group row">
		<label for="mucluong" class="col-sm-2 col-form-label">Mức lương</label>
		<div class="col-sm-4">
			<input name="mucluong_tu" type="text" class="form-control" id="diachi" placeholder="Nhập mức lương tối thiểu" value="{{ $congviec->mucluong_tu }}" />
			<label for="mucluong" class="col-sm-4 col-form-label">Từ (Đơn vị: Triệu)</label>
		</div>
		<div class="col-sm-4">
			<input name="mucluong_den" type="text" class="form-control" id="diachi" placeholder="Nhập mức lương tối đa" value="{{ $congviec->mucluong_den }}" />
			<label for="mucluong" class="col-sm-4 col-form-label">Đến (Đơn vị: Triệu)</label>
		</div>
		
	</div>
	{{-- kết thúc mức lương --}}
	<div class="form-group row">
		<label for="soluongtuyen" class="col-sm-2 col-form-label">Số lượng tuyển</label>
		<div class="col-sm-9">
			<input name="soluongtuyen" type="text" class="form-control" id="diachi" placeholder="Số lượng tuyển" value="{{ $congviec->soluongtuyen }}" />
		</div>		
	</div>
	<div class="form-group row">
		<label for="nganhnghe" class="col-sm-2 col-form-label">Yêu cầu ngành nghề</label>
		<div class="col-sm-9">
			<select name="nganhnghe[]" multiple="multiple" id="type_product" class="form-control js-example-basic-multiple">
				@foreach($nganhnghe as $nganhnghe)
				<option value="{{ $nganhnghe->id}}" {{ array_key_exists($nganhnghe->id, $nganhnghe_congviec)? 'selected = "selected"' : '' }}>{{ $nganhnghe->tennganh}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="thoigianungtuyen" class="col-sm-2 col-form-label">Hạn nộp hồ sơ</label>
		<div class="col-sm-3">
			
			<input name="time_nophoso" type="date" class="form-control" id="company_name" placeholder="Tên công việc" value="{{ $congviec->time_nophoso }}" />
			<label for="exampleInputEmail1">Đến hết ngày</label>
		</div>
		
	</div>
	<div class="form-group row">
		<label for="motacongviec" class="col-sm-2 col-form-label">Mô tả công việc</label>
		<div class="col-sm-9">
			<textarea name="motacongviec" type="text" class="form-control" id="company_name" placeholder="Mô tả công về công việc đăng tuyển" rows="6">{{ $congviec->motacongviec }}</textarea>
		</div>
	</div>	
	<div class="form-group row">
		<label for="yeucaucongviec" class="col-sm-2 col-form-label">Yêu cầu công việc</label>
		<div class="col-sm-9">
			<textarea name="yeucaucongviec" type="text" class="form-control" id="company_name" placeholder="Một số yêu cầu đáp ứng công việc" value="{{ old('yeucaucongviec') }}">{{ $congviec->yeucaucongviec }}</textarea>
		</div>
	</div>	
	<div class="form-group row">
		<label for="nguoilienhe" class="col-sm-2 col-form-label">Người liên hệ</label>
		<div class="col-sm-9">
			<input name="nguoilienhe" type="text" class="form-control" id="company_name" placeholder="Người liên hệ" value="{{ $congviec->nguoilienhe }}" />			
		</div>		
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-9">
			<input name="email" type="text" class="form-control" id="company_name" placeholder="Email" value="{{ $congviec->email_nguoilienhe }}" />			
		</div>
	</div>
	
	<div class="form-group row">
		<label for="dangtin" class="col-sm-2 col-form-label"></label>
		<div class="col-sm-4">
			<button type="submit" class="form-control btn btn-success" id="company_name">Đăng tin</button>
		</div>
	</div>
</form>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
	$('.js-example-basic-multiple').select2({
	language: "vi",
	placeholder: 'Chọn ngành nghề đáp ứng yêu cầu',
	maximumSelectionLength: 5,
	allowClear: true
	});
});
</script>
{{-- ajax xử lý địa điểm --}}
<script type="text/javascript">
	$(document).ready(function(){
		$("#thanhpho").change(function(){
			var idThanhpho = $(this).val();
			$.get("{{ asset('diachi/quanhuyen') }}/"+idThanhpho, function(data){
				$("#quanhuyen").html(data);
			});
		});
		$("#quanhuyen").change(function(){
			var idquanhuyen = $(this).val();
			$.get("{{ asset('diachi/xaphuong') }}/"+idquanhuyen, function(data){
				$("#xaphuong").html(data);
			});
		});
	});
</script>
@endsection