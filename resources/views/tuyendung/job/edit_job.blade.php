@extends('tuyendung.template.app')
@section('title','Sửa công việc')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('job.update', $jop->id) }}" enctype="multipart/form-data" role="form">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="ten_cong_viec" class="col-sm-3 col-form-label">Tên công việc</label>
            <div class="col-sm-8">
                <input name="ten_cong_viec" type="text" class="form-control" id="ten_cong_viec"
                       placeholder="Tên công việc"
                       value="{{ $jop->ten_cong_viec }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="gia_tri_cong_viec" class="col-sm-3 col-form-label">Giá trị công việc</label>
            <div class="col-sm-8">
                <div class="form-group col-md-6">
                    <label for="email" class="col-md-2" style="padding-left: 0;">Từ</label>
                    <div class="col-md-10">
                        <input name="gia_tri_cong_viec[]" type="number" class=" form-control col-md-6" id="min" value="@php $a = json_decode($jop->gia_tri_cong_viec); echo $a[0]; @endphp">
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Đến:</label>
                    <div class="col-md-10">
                        <input name="gia_tri_cong_viec[]" type="number" class=" form-control col-md-6" id="max" value="@php $a = json_decode($jop->gia_tri_cong_viec); echo $a[1]; @endphp">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="thoi_gian_bao_gia" class="col-sm-3 col-form-label">Hạn cuối báo giá</label>
            <div class="col-sm-8">
                <input name="thoi_gian_bao_gia" type="date" class="form-control" id="thoi_gian_bao_gia"
                       placeholder="thoi_gian_bao_gia việc"
                       value="{{ $jop->thoi_gian_bao_gia }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="thoi_gian_thu_hien" class="col-sm-3 col-form-label">Thời gian thực hiện</label>
            <div class="col-sm-8">
                <div class="form-group col-md-6">
                    <label for="date" class="col-md-2" style="padding-left: 0;">Từ</label>
                    <div class="col-md-10">
                        <input name="thoi_gian_thuc_hien[]" type="date" class="form-control col-md-6" id="min" value="@php $a = json_decode($jop->thoi_gian_thuc_hien); echo $a[0]; @endphp">
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Đến:</label>
                    <div class="col-md-10">
                        <input name="thoi_gian_thuc_hien[]" type="date" class="form-control col-md-6" id="max" value="@php $a = json_decode($jop->thoi_gian_thuc_hien); echo $a[1]; @endphp">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="dia_diem_uu_tien" class="col-sm-3 col-form-label">Địa điểm ưu tiên</label>
            <div class="col-sm-8">
                <select name="dia_diem_uu_tien" id="dia_diem_uu_tien" class="form-control">
                    @foreach($address as $address)
                        <option value="{{ $address->thanhpho_id }}"
                                @if($jop->dia_diem_uu_tien == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="von_dieu_le" class="col-sm-3 col-form-label">Vốn điều lệ</label>
            <div class="col-sm-8">
                <input name="von_dieu_le" type="text" class="form-control" id="von_dieu_le"
                       placeholder="Vốn điều lệ"
                       value="{{ $jop->von_dieu_le }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="Linh_vuc_hoat_dong" class="col-sm-3 col-form-label">Lĩnh vực hoạt động</label>
            <div class="col-sm-8">
                <select name="Linh_vuc_hoat_dong" id="Linh_vuc_hoat_dong" class="form-control" required>
                    <option> Chọn lĩnh vực cần tuyển</option>
                    @foreach($linhvuc as $linhvuc)
                        <option value="{{ $linhvuc->id }}"
                                @if(old('Linh_vuc_hoat_dong') == $linhvuc->id) selected @endif>{{ $linhvuc->ten_linh_vuc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="career" class="col-sm-3 col-form-label">Ngành</label>
            <div class="col-sm-8">
                <select name="nganh[]" multiple="multiple" id="career" class="form-control career" required>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="so_nam_kinh_nghiem" class="col-sm-3 col-form-label">Số năm kinh nghiệm</label>
            <div class="col-sm-8">
                <input name="so_nam_kinh_nghiem" type="text" class="form-control" id="so_nam_kinh_nghiem"
                       placeholder="Số năm kinh nghiêmj"
                       value="{{$jop->so_nam_kinh_nghiem }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="loai_hinh_doanh_nghiep" class="col-sm-3 col-form-label">Loại hình doanh nghiệp</label>
            <div class="col-sm-8">
                <select name="loai_hinh_doanh_nghiep" id="loai_hinh_doanh_nghiep" class="form-control">
                    <option value="Công ty TNHH" @if($jop->loai_hinh_doanh_nghiep == 'Công ty TNHH') ? selected : '' @endif>Công ty TNHH</option>
                    <option value="Công ty Cổ Phần" @if($jop->loai_hinh_doanh_nghiep == 'Công ty Cổ Phần') ? selected : '' @endif>Công ty Cổ Phần</option>
                    <option value="Doanh nghiệp tư nhân"@if($jop->loai_hinh_doanh_nghiep == 'Doanh nghiệp tư nhân') ? selected : '' @endif>Doanh nghiệp tư nhân</option>
                    <option value="Công ty Hợp Danh" @if($jop->loai_hinh_doanh_nghiep == 'Công ty Hợp Danh') ? selected : '' @endif>Công ty Hợp Danh</option>
                    <option value="Công ty liên doanh" @if($jop->loai_hinh_doanh_nghiep == 'Công ty liên doanh') ? selected : '' @endif>Công ty liên doanh</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="yeu_cau_nhan_su" class="col-sm-3 col-form-label">Yêu cầu nhân sự tối thiểu</label>
            <div class="col-sm-8">
                <div class="form-group col-md-12">
                    <label for="date" class="col-md-2" style="padding-left: 0;">Tên</label>
                    <div class="col-md-8">
                        <label for="date" class="col-md-8" style="padding-left: 0;">Số lượng</label>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="date" class="col-md-2" style="padding-left: 0;">Tiến sỹ</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="min" value="@php $a = json_decode($jop->nhan_su); echo $a[0]; @endphp">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Thạc sỹ:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="@php $a = json_decode($jop->nhan_su); echo $a[1]; @endphp">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Đại học:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="@php $a = json_decode($jop->nhan_su); echo $a[2]; @endphp">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Cao Đẳng:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="@php $a = json_decode($jop->nhan_su); echo $a[3]; @endphp">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Công nhân:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="@php $a = json_decode($jop->nhan_su); echo $a[4]; @endphp">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="thiet_bi" class="col-sm-3 col-form-label">Yêu cầu thiết bị</label>
            <div class="col-sm-8" id="thiet_bi">
                <div class="form-group col-md-12">
                    <label for="date" class="col-md-7" style="padding-left: 0;">Tên thiết bị</label>
                    <div class="col-md-5">
                        <label for="date" class="col-md-8" style="padding-left: 0;">Số lượng</label>
                    </div>
                </div>
                @php
                    $i=-1;
                @endphp
                @foreach($b as $value)
                    @php
                        $i++;
                    @endphp
                    <div class="form-group col-md-12">
                        <div class="col-md-7">
                            <input name="thiet_bi[{{$i}}][]" type="text" class="form-control col-md-6" id="ten_thiet_bi"
                                   value="{{ $value[0] }}">
                        </div>
                        <div class="col-md-4">
                            <input name="thiet_bi[{{ $i }}][]" type="number" class="form-control col-md-6" id="so_luong"
                                   value="{{ $value[1] }}">
                        </div>
                        <a href="#" class="remove_field col-md-1">Xóa</a>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-8 col-sm-offset-3">
                <div class="col-sm-12">
                    <a class="btn btn-success" id="add_yeu_cau">Thêm yêu cầu thiết bị</a>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="chi_tiet_cong_viec" class="col-sm-3 col-form-label">Chi tiết công việc</label>
            <div class="col-sm-8">
                <textarea name="chi_tiet_cong_viec" type="text" class="form-control" id="editor"  placeholder="Yêu cầu chi tiết" value="{{ old('chi_tiet_cong_viec') }}" required> {{ $jop->chi_tiet_cong_viec }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="yeu_cau_cong_viec" class="col-sm-3 col-form-label">Yêu cầu công việc</label>
            <div class="col-sm-8">
                <textarea name="yeu_cau_cong_viec" type="text" class="form-control" id="editor" placeholder="Yêu cầu chi tiết" value="{{ old('yeu_cau_cong_viec') }}" required>{{ $jop->yeu_cau_cong_viec }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="phuc_loi_cong_viec" class="col-sm-3 col-form-label">Phúc lợi</label>
            <div class="col-sm-8">
                <textarea name="phuc_loi_cong_viec" type="text" class="form-control" id="editor" placeholder="Phúc lợi" value="{{ old('phuc_loi_cong_viec') }}" required>  {{ $jop->phuc_loi_cong_viec }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="yeu_cau_ho_so_dinh_kem" class="col-sm-3 col-form-label">yêu cầu hồ sơ ứng tuyển</label>
            <div class="col-sm-8">
                <textarea name="yeu_cau_ho_so_dinh_kem" type="text" class="form-control" id="editor" placeholder="yêu cầu hồ sơ ứng tuyển" value="{{ old('yeu_cau_ho_so_dinh_kem') }}" required>{{ $jop->yeu_cau_ho_so_dinh_kem }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_spec" class="col-sm-3 col-form-label">Attach SPec</label>
            <div class="col-sm-8">
                <input name="attach_spec" type="file" class="form-control" id="attach_spec"
                       value="{{ old('attach_spec') }}" rows="6" required>
                </input>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_boq" class="col-sm-3 col-form-label">Attach Boq</label>
            <div class="col-sm-8">
                <input name="attach_boq" type="file" class="form-control" id="attach_boq"
                       value="{{ old('attach_boq') }}" rows="6" required>
                </input>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_ban_ve_ket_cau" class="col-sm-3 col-form-label">Attach bản vẽ kết cấu</label>
            <div class="col-sm-8">
                <input name="attach_ban_ve_ket_cau" type="file" class="form-control" id="attach_ban_ve_ket_cau"
                       value="{{ old('attach_ban_ve_ket_cau') }}" rows="6" required>
                </input>
            </div>
        </div>
        <div class="form-group row">
            <label for="dangtin" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="form-control btn btn-success" id="company_name">Đăng tin</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.career').select2({
                language: "vi",
                placeholder: 'Chọn ngành nghề đáp ứng yêu cầu',
                maximumSelectionLength: 5,
                allowClear: true
            });
        });
    </script>
    {{-- ajax xử lý địa điểm --}}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#Linh_vuc_hoat_dong").change(function () {
                var idLinhvuc = $(this).val();
                $.get("{{ asset('tuyendung/getnganh/nganh') }}/" + idLinhvuc, function (data) {
                    $("#career").html(data);
                });
            });
        });
    </script>
    <script type="text/javascript">
        var allEditors = document.querySelectorAll('#editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }
    </script>
    <script>
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $("#thiet_bi"); //Fields wrapper
            var add_button = $("#add_yeu_cau"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="form-group col-md-12 truong">' +
                        '<p class="col-md-7">' +
                        '<input name="thiet_bi[' + x + '][]" type="text" class="form-control col-md-6" id="ten_thiet_bi">' +
                        '</p>' +
                        '<p class="col-md-4">' +
                        '<input name="thiet_bi[' + x + '][]" type="number" class="form-control col-md-6" id="so_luong">' +
                        '</p>' +
                        '<a href="#" class="remove_field col-md-1">Xóa</a>' +
                        '</div>');
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
@endsection