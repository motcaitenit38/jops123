@extends('timviec.template.app')
@section('title','Thông tin Công ty ứng viên')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('thongtintimviec.store') }}"
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
                <input name="von_dieu_le" type="number" class="form-control" id="von_dieu_le" placeholder="Vốn điều lệ"
                       value="{{ old('von_dieu_le') }}" required/>
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
                    <option value="Công ty TNHH">Công ty TNHH</option>
                    <option value="Công ty Cổ Phần">Công ty Cổ Phần</option>
                    <option value="Doanh nghiệp tư nhân">Doanh nghiệp tư nhân</option>
                    <option value="Công ty Hợp Danh">Công ty Hợp Danh</option>
                    <option value="Công ty liên doanh">Công ty liên doanh</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="dien_tich_quy_mo" class="col-sm-3 col-form-label">Diện tích quy mô</label>
            <div class="col-sm-8">
                <input name="dien_tich_quy_mo" type="number" class="form-control" id="dien_tich_quy_mo"
                       placeholder="năm thành lập"
                       value="{{ old('dien_tich_quy_mo') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="so_luong_day_chuyen" class="col-sm-3 col-form-label">Số lượng dây chuyển sản xuất</label>
            <div class="col-sm-8">
                <input name="so_luong_day_chuyen" type="number" class="form-control" id="so_luong_day_chuyen"
                       placeholder="Số lượng dây chuyển sản xuất"
                       value="{{ old('so_luong_day_chuyen') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="tong_cong_suat" class="col-sm-3 col-form-label">Tổng công suất</label>
            <div class="col-sm-8">
                <input name="tong_cong_suat" type="number" class="form-control" id="tong_cong_suat"
                       placeholder="Tổng công suất nhà máy"
                       value="{{ old('tong_cong_suat') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Giới thiệu về công ty</label>
            <div class="col-sm-8">
                 <textarea name="gioi_thieu_cong_ty" type="text" class="form-control" id="gioi_thieu_cong_ty" placeholder="Giới thiệu về công ty" rows="6" required>
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="file_dinh_kem_kinh_doanh" class="col-sm-3 col-form-label">File đính kèm đăng ký kinh doanh</label>
            <div class="col-sm-8">
                <input name="file_dinh_kem_kinh_doanh" type="file" class="form-control" id="tong_cong_suat"
                       placeholder="file đính kèm đăng ký kinh doanh"
                       value="{{ old('file_dinh_kem_kinh_doanh') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="file_dinh_kem_thong_tin_cong_ty" class="col-sm-3 col-form-label">File đính kèm giới thiệu công ty</label>
            <div class="col-sm-8">
                <input name="file_dinh_kem_thong_tin_cong_ty" type="file" class="form-control" id="tong_cong_suat"
                       placeholder="File đính kèm thông tin công ty"
                       value="{{ old('file_dinh_kem_thong_tin_cong_ty') }}" required/>
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