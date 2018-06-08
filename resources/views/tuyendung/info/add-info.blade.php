@extends('tuyendung.template.app')
@section('title','Cập nhật thông tin công ty')
@section('content')

    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.store') }}"
          enctype="multipart/form-data" role="form">
        @csrf
        <div class="form-group row">
            <label for="ten_doanh_nghiep" class="col-sm-3 col-form-label">Tên công ty</label>
            <div class="col-sm-8">
                <input name="ten_doanh_nghiep" type="text" class="form-control" id="ten_doanh_nghiep"
                       placeholder="Tên công ty"
                       value="{{ old('ten_doanh_nghiep') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="dien_thoai" class="col-sm-3 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
                <input name="dien_thoai" type="text" class="form-control" id="dien_thoai"
                       placeholder="Điện thoại công ty"
                       value="{{ old('dien_thoai') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-3 col-form-label">Địa chỉ website công ty</label>
            <div class="col-sm-8">
                <input name="website" type="text" class="form-control" id="website" placeholder="website công ty"
                       value="{{ old('website') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_id" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                <select name="dia_diem_id" id="dia_diem_id" class="form-control">
                    @foreach($address as $address)
                        <option value="{{ $address->thanhpho_id }}"
                                @if(old('dia_diem_id') == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_cuthe" class="col-sm-3 col-form-label">Địa chỉ cụ thể</label>
            <div class="col-sm-8">
                <input name="dia_diem_cuthe" type="text" class="form-control" id="dia_diem_cuthe"
                       placeholder="Địa chỉ cụ thể"
                       value="{{ old('dia_diem_cuthe') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="ma_so_thue" class="col-sm-3 col-form-label">Mã số thuế</label>
            <div class="col-sm-8">
                <input name="ma_so_thue" type="text" class="form-control" id="ma_so_thue"
                       placeholder="mã số thuế công ty" value="{{ old('ma_so_thue') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="von_dieu_le" class="col-sm-3 col-form-label">Vốn điều lệ</label>
            <div class="col-sm-8">
                <input name="von_dieu_le" type="text" class="form-control" id="von_dieu_le" placeholder="Vốn điều lệ"
                       value="{{ old('von_dieu_le') }}" required/>
                <span id="truongcc"></span><span> Triệu đồng</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="nam_thanh_lap" class="col-sm-3 col-form-label">năm thành lập</label>
            <div class="col-sm-8">
                <input name="nam_thanh_lap" type="date" class="form-control" id="nam_thanh_lap"
                       placeholder="năm thành lập"
                       value="{{ old('nam_thanh_lap') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="loai_hinh_doanh_nghiep" class="col-sm-3 col-form-label">Loại hình doanh nghiệp</label>
            <div class="col-sm-8">
                <select name="loai_hinh_doanh_nghiep" id="loai_hinh_doanh_nghiep" class="form-control">
                    <option value="Công ty TNHH" @if( old('loai_hinh_doanh_nghiep') === 'Công ty TNHH')  ? selected : '' @endif>Công ty TNHH</option>
                    <option value="Công ty Cổ Phần" @if( old('loai_hinh_doanh_nghiep') === 'Công ty Cổ Phần')  ? selected : '' @endif>Công ty Cổ Phần</option>
                    <option value="Doanh nghiệp tư nhân" @if( old('loai_hinh_doanh_nghiep') === 'Doanh nghiệp tư nhân')  ? selected : '' @endif>Doanh nghiệp tư nhân</option>
                    <option value="Công ty Hợp Danh" @if( old('loai_hinh_doanh_nghiep') === 'Công ty Hợp Danh')  ? selected : '' @endif>Công ty Hợp Danh</option>
                    <option value="Công ty liên doanh" @if( old('loai_hinh_doanh_nghiep') === 'Công ty liên doanh')  ? selected : '' @endif>Công ty liên doanh</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Giới thiệu về công ty</label>
            <div class="col-sm-8">
                 <textarea name="gioi_thieu_cong_ty" type="text" class="form-control" id="gioi_thieu_cong_ty" placeholder="Giới thiệu về công ty" rows="6" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="logo" class="col-sm-3 col-form-label">logo công ty</label>
            <div class="col-sm-8">
                <input name="logo" type="file" class="form-control" id="logo" value="{{ old('logo') }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="dangtin" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="form-control btn btn-success" id="company_name">Tạo thông tin hồ sơ</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        var input3 = document.getElementById('von_dieu_le');
        input3.addEventListener('keyup', function(e)
        {
            input3.value = format_number(this.value);
            $('#truongcc').html(format_number(this.value));
        });
        function format_number(number, prefix, thousand_separator, decimal_separator) {
            var thousand_separator = thousand_separator || ',',
                decimal_separator = decimal_separator || '.',
                regex = new RegExp('[^' + decimal_separator + '\\d]', 'g'),
                number_string = number.replace(regex, '').toString(),
                split = number_string.split(decimal_separator),
                rest = split[0].length % 3,
                result = split[0].substr(0, rest),
                thousands = split[0].substr(rest).match(/\d{3}/g);

            if (thousands) {
                separator = rest ? thousand_separator : '';
                result += separator + thousands.join(thousand_separator);
            }
            result = split[1] != undefined ? result + decimal_separator + split[1] : result;
            return prefix == undefined ? result : (result ? prefix + result : '');
        };
    </script>
@endsection