@extends('timviec.template.app')
@section('title','Danh sách công việc đã lưu')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('thongtintimviec.update', $info->id) }}" enctype="multipart/form-data" role="form">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="ten_doanh_nghiep" class="col-sm-3 col-form-label">Tên công ty</label>
            <div class="col-sm-8">
                <input name="ten_doanh_nghiep" type="text" class="form-control" id="ten_doanh_nghiep"
                       placeholder="Tên công ty"
                       value=" {{ $info->ten_doanh_nghiep }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="dien_thoai" class="col-sm-3 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
                <input name="dien_thoai" type="text" class="form-control" id="dien_thoai"
                       placeholder="Điện thoại công ty"
                       value="{{ $info->dien_thoai }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-3 col-form-label">Địa chỉ website công ty</label>
            <div class="col-sm-8">
                <input name="website" type="text" class="form-control" id="website" placeholder="website công ty"
                       value="{{ $info->website }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_id" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                <select name="dia_diem_id" id="dia_diem_id" class="form-control">
                    @foreach($address as $address)
                        <option value="{{ $address->thanhpho_id }}"
                                @if($info->dia_diem_id == $address->thanhpho_id) selected @endif>{{ $address->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_cuthe" class="col-sm-3 col-form-label">Địa chỉ cụ thể</label>
            <div class="col-sm-8">
                <input name="dia_diem_cuthe" type="text" class="form-control" id="dia_diem_cuthe"
                       placeholder="Địa chỉ cụ thể"
                       value="{{ $info->dia_diem_cuthe }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="ma_so_thue" class="col-sm-3 col-form-label">Mã số thuế</label>
            <div class="col-sm-8">
                <input name="ma_so_thue" type="text" class="form-control" id="ma_so_thue"
                       placeholder="mã số thuế công ty" value=" {{ $info->ma_so_thue }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="von_dieu_le" class="col-sm-3 col-form-label">Vốn điều lệ</label>
            <div class="col-sm-8">
                <input name="von_dieu_le" type="number" class="form-control" id="von_dieu_le" placeholder="Vốn điều lệ"
                       value="{{ $info->von_dieu_le }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="nam_thanh_lap" class="col-sm-3 col-form-label">năm thành lập</label>
            <div class="col-sm-8">
                <input name="nam_thanh_lap" type="date" class="form-control" id="nam_thanh_lap"
                       placeholder="năm thành lập"
                       value="{{ $info->nam_thanh_lap }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="loai_hinh_doanh_nghiep" class="col-sm-3 col-form-label">Loại hình doanh nghiệp</label>
            <div class="col-sm-8">
                <select name="loai_hinh_doanh_nghiep" id="loai_hinh_doanh_nghiep" class="form-control">
                    <option value="Công ty TNHH" @if( $info->loai_hinh_doanh_nghiep === 'Công ty TNHH')  ? selected : '' @endif>Công ty TNHH</option>
                    <option value="Công ty Cổ Phần" @if( $info->loai_hinh_doanh_nghiep === 'Công ty Cổ Phần')  ? selected : '' @endif>Công ty Cổ Phần</option>
                    <option value="Doanh nghiệp tư nhân" @if( $info->loai_hinh_doanh_nghiep === 'Doanh nghiệp tư nhân')  ? selected : '' @endif>Doanh nghiệp tư nhân</option>
                    <option value="Công ty Hợp Danh" @if( $info->loai_hinh_doanh_nghiep === 'Công ty Hợp Danh')  ? selected : '' @endif>Công ty Hợp Danh</option>
                    <option value="Công ty liên doanh" @if( $info->loai_hinh_doanh_nghiep === 'Công ty liên doanh')  ? selected : '' @endif>Công ty liên doanh</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="dien_tich_quy_mo" class="col-sm-3 col-form-label">Quy mô công ty</label>
            <div class="col-sm-8">
                <input name="dien_tich_quy_mo" type="number" class="form-control" id="dien_tich_quy_mo"
                       placeholder="năm thành lập"
                       value="{{ $info->dien_tich_quy_mo }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="so_luong_day_chuyen" class="col-sm-3 col-form-label">Số lượng dây chuyền</label>
            <div class="col-sm-8">
                <input name="so_luong_day_chuyen" type="number" class="form-control" id="so_luong_day_chuyen"
                       placeholder="năm thành lập"
                       value="{{ $info->so_luong_day_chuyen }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="tong_cong_suat" class="col-sm-3 col-form-label">Tổng công suất</label>
            <div class="col-sm-8">
                <input name="tong_cong_suat" type="number" class="form-control" id="tong_cong_suat"
                       placeholder="năm thành lập"
                       value="{{ $info->tong_cong_suat }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Giới thiệu về công ty</label>
            <div class="col-sm-8">
                 <textarea name="gioi_thieu_cong_ty" type="text" class="form-control" id="gioi_thieu_cong_ty" placeholder="Giới thiệu về công ty" rows="6" required>{{ $info->gioi_thieu_cong_ty }}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_ban_ve_ket_cau" class="col-sm-3 col-form-label">Attach đăng ký kinh doanh</label>
            <div class="col-sm-8">
                <input name="file_dinh_kem_kinh_doanh" type="file" class="form-control" id="file_dinh_kem_kinh_doanh">
                </input>
            </div>
        </div>
        <div class="form-group row">
            <label for="file_dinh_kem_thong_tin_cong_ty" class="col-sm-3 col-form-label">Attach giới thiệu công ty</label>
            <div class="col-sm-8">
                <input name="file_dinh_kem_thong_tin_cong_ty" type="file" class="form-control" id="file_dinh_kem_thong_tin_cong_ty">
                </input>
            </div>
        </div>
        <div class="form-group row">
            <label for="logo" class="col-sm-3 col-form-label">logo công ty</label>
            <div class="col-sm-8">
                <input name="logo" type="file" class="form-control" id="logo"
                       value="{{ $info->logo }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="dangtin" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="form-control btn btn-success" id="company_name">Cập nhật thông tin</button>
            </div>
        </div>
    </form>

@endsection