@extends('tuyendung.template.app')
@section('title','Chi tiết thông tin ứng viên');
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('info.store') }}"
          enctype="multipart/form-data" role="form">
        @csrf
        <div class="form-group row">
            <label for="ten_doanh_nghiep" class="col-sm-3 col-form-label">Tên công ty</label>
            <div class="col-sm-8">
                {{ $thongtin->ten_doanh_nghiep }}
            </div>
        </div>
        <div class="form-group row">
            <label for="dien_thoai" class="col-sm-3 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
                {{ $thongtin->dien_thoai }}
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-3 col-form-label">Địa chỉ website công ty</label>
            <div class="col-sm-8">
                {{ $thongtin->website }}
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_id" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                {{ $thongtin->Address->name }}
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_cuthe" class="col-sm-3 col-form-label">Địa chỉ cụ thể</label>
            <div class="col-sm-8">
                {{ $thongtin->dia_diem_cuthe }}
            </div>
        </div>
        <div class="form-group row">
            <label for="ma_so_thue" class="col-sm-3 col-form-label">Mã số thuế</label>
            <div class="col-sm-8">
                {{ $thongtin->ma_so_thue }}
            </div>
        </div>
        <div class="form-group row">
            <label for="von_dieu_le" class="col-sm-3 col-form-label">Vốn điều lệ</label>
            <div class="col-sm-8">
                {{ $thongtin->von_dieu_le }}
            </div>
        </div>
        <div class="form-group row">
            <label for="nam_thanh_lap" class="col-sm-3 col-form-label">năm thành lập</label>
            <div class="col-sm-8">
                {{ $thongtin->nam_thanh_lap }}
            </div>
        </div>
        <div class="form-group row">
            <label for="loai_hinh_doanh_nghiep" class="col-sm-3 col-form-label">Loại hình doanh nghiệp</label>
            <div class="col-sm-8">
                {{ $thongtin->loai_hinh_doanh_nghiep }}
            </div>
        </div>

        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Giá trị hợp đồng lớn nhất</label>
            <div class="col-sm-8">
                {!!  $cv->gia_tri_hop_dong_lon !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Số năm kinh nghiệm</label>
            <div class="col-sm-8">
                {!!  $cv->so_nam_kinh_nghiem !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Năng lực thiết bị</label>
            <div class="col-sm-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tên thiết bị</th>
                        <th>Số lượng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($b as $value)
                        <tr>
                            <td>{{ $value[0] }}</td>
                            <td>{{ $value[1] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Năng lực nhân sự</label>
            <div class="col-sm-8">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nhân sự</th>
                            <th>Số lượng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Tiến sỹ</td>
                            <td>{{ $nhansu[0] }}</td>
                        </tr>
                        <tr>
                            <td>Thạc sỹ</td>
                            <td>{{ $nhansu[1] }}</td>
                        </tr>
                        <tr>
                            <td>Đại học</td>
                            <td>{{ $nhansu[2] }}</td>
                        </tr>
                        <tr>
                            <td>Cao đẳng</td>
                            <td>{{ $nhansu[3] }}</td>
                        </tr>
                        <tr>
                            <td>Công nhân</td>
                            <td>{{ $nhansu[4] }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">File đính kèm theo yêu cầu</label>
            <div class="col-sm-8">
                <a href="{{ url('/'.$file->file_dinh_kem) }}">File đính kèm</a>
            </div>
        </div>
        <div class="form-group row">
            <label for="gioi_thieu_cong_ty" class="col-sm-3 col-form-label">Giới thiệu</label>
            <div class="col-sm-8">
                {!!  $cv->gioi_thieu !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <a href="{{ asset('tuyendung/info/'.$thongtin->id.'/edit') }}" >
                    <span class="btn btn-default btn-file btn-block">	edit </span></a>
            </div>
        </div>
    </form>

@endsection