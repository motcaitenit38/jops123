@extends('tuyendung.template.app')
@section('title','Thêm mới công việc')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('job.store') }}"
          enctype="multipart/form-data" role="form">
        @csrf
        <div class="form-group row">
            <label for="ten_cong_viec" class="col-sm-3 col-form-label">Tên công việc</label>
            <div class="col-sm-8">
                <input name="ten_cong_viec" type="text" class="form-control" id="ten_cong_viec"
                       placeholder="Tên công việc"
                       value="{{ old('ten_cong_viec') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="gia_tri_cong_viec" class="col-sm-3 col-form-label">Giá trị công việc</label>
            <div class="col-sm-8">
                <div class="form-group col-md-6">
                    <label for="min" class="col-md-2" style="padding-left: 0;">Từ</label>
                    <div class="col-md-10">
                        <input name="gia_tri_cong_viec[]" type="text" class=" form-control col-md-6" id="min"
                               value="{{ old('gia_tri_cong_viec.0') }}" >
                        <span id="truongaa"></span><span> Triệu đồng</span>
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Đến:</label>
                    <div class="col-md-10">
                        <input name="gia_tri_cong_viec[]" type="text" class=" form-control col-md-6" id="max"
                               value="{{ old('gia_tri_cong_viec.1') }}" >
                        <span id="truongbb"></span><span> Triệu đồng</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="thoi_gian_bao_gia" class="col-sm-3 col-form-label">Hạn cuối báo giá</label>
            <div class="col-sm-8">
                <input name="thoi_gian_bao_gia" type="date" class="form-control" id="thoi_gian_bao_gia"
                       placeholder="thoi_gian_bao_gia việc"
                       value="{{ old('thoi_gian_bao_gia') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="thoi_gian_thu_hien" class="col-sm-3 col-form-label">Thời gian thực hiện</label>
            <div class="col-sm-8">
                <div class="form-group col-md-6">
                    <label for="date" class="col-md-2" style="padding-left: 0;">Từ</label>
                    <div class="col-md-10">
                        <input name="thoi_gian_thuc_hien[]" type="date" class="form-control col-md-6" id="min" required />
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Đến:</label>
                    <div class="col-md-10">
                        <input name="thoi_gian_thuc_hien[]" type="date" class="form-control col-md-6" id="max" required />
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
                                @if(old('dia_diem_uu_tien') == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="von_dieu_le" class="col-sm-3 col-form-label">Vốn điều lệ</label>
            <div class="col-sm-8">
                <input name="von_dieu_le" type="text" class="form-control" id="von_dieu_le"
                       placeholder="Vốn điều lệ"
                       value="{{ old('von_dieu_le') }}" required/>
                <span id="truongcc"></span><span> Triệu đồng</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="Linh_vuc_hoat_dong" class="col-sm-3 col-form-label">Lĩnh vực hoạt động</label>
            <div class="col-sm-8">
                <select name="Linh_vuc_hoat_dong" id="Linh_vuc_hoat_dong" class="form-control">
                    <option value="0"> Chọn lĩnh vực cần tuyển</option>
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
                <input name="so_nam_kinh_nghiem" type="number" class="form-control" id="so_nam_kinh_nghiem"
                       placeholder="Số năm kinh nghiêmj"
                       value="{{ old('so_nam_kinh_nghiem') }}" min="0" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="loai_hinh_doanh_nghiep" class="col-sm-3 col-form-label">Loại hình doanh nghiệp</label>
            <div class="col-sm-8">
                <select name="loai_hinh_doanh_nghiep" id="loai_hinh_doanh_nghiep" class="form-control">
                    <option value="Công ty TNHH" @if( old('loai_hinh_doanh_nghiep') === 'Công ty TNHH')  ? selected : '' @endif>Công ty TNHH</option>
                    <option value="Công ty Cổ Phần" @if( old('loai_hinh_doanh_nghiep') === 'Công ty Cổ Phần')  ? selected : '' @endif>Công ty Cổ Phần</option>
                    <option value="Doanh nghiệp tư nhân" @if( old('loai_hinh_doanh_nghiep') === 'Doanh nghiệp tư nhân')  ? selected : '' @endif>Doanh nghiệp tư nhân</option>
                    <option value="Công ty Hợp Doanh" @if( old('loai_hinh_doanh_nghiep') === 'Công ty Hợp Doanh')  ? selected : '' @endif>Công ty Hợp Doanh</option>
                    <option value="Công ty liên doanh" @if( old('loai_hinh_doanh_nghiep') === 'Công ty liên doanh')  ? selected : '' @endif>Công ty Liên Doanh</option>
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
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="min" value="{{ old('nhan_su.0') }}" min="0" placeholder="Số lượng" />
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Thạc sỹ:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="{{ old('nhan_su.1') }}" min="0" placeholder="Số lượng">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Đại học:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="{{ old('nhan_su.2') }}" min="0" placeholder="Số lượng">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Cao Đẳng:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="{{ old('nhan_su.3') }}"  min="0" placeholder="Số lượng">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd" class="col-md-2" style="padding-left: 0;">Công nhân:</label>
                    <div class="col-md-8">
                        <input name="nhan_su[]" type="number" class=" form-control col-md-6" id="max" value="{{ old('nhan_su.4') }}"  min="0" placeholder="Số lượng">
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
                <div class="form-group col-md-12">
                    <div class="col-md-7">
                        <input name="thiet_bi[0][]" type="text" class="form-control col-md-6" id="ten_thiet_bi" placeholder="tên thiết bị">
                    </div>
                    <div class="col-md-4">
                        <input name="thiet_bi[0][]" type="number" class="form-control col-md-6" id="so_luong" placeholder="số lượng">
                    </div>
                </div>
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
                <textarea name="chi_tiet_cong_viec" type="text" class="form-control" id="editor"
                          placeholder="Yêu cầu chi tiết"  required>{{ old('chi_tiet_cong_viec') }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="yeu_cau_cong_viec" class="col-sm-3 col-form-label">Yêu cầu công việc</label>
            <div class="col-sm-8">
                <textarea name="yeu_cau_cong_viec" type="text" class="form-control" id="editor"
                          placeholder="Yêu cầu chi tiết" required>{{ old('yeu_cau_cong_viec') }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="phuc_loi_cong_viec" class="col-sm-3 col-form-label">Phúc lợi</label>
            <div class="col-sm-8">
                <textarea name="phuc_loi_cong_viec" type="text" class="form-control" id="editor"
                          placeholder="Phúc lợi" required>{{ old('phuc_loi_cong_viec') }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="yeu_cau_ho_so_dinh_kem" class="col-sm-3 col-form-label">yêu cầu hồ sơ ứng tuyển</label>
            <div class="col-sm-8">
                <textarea name="yeu_cau_ho_so_dinh_kem" type="text" class="form-control" id="editor"
                          placeholder="yêu cầu hồ sơ ứng tuyển" required>{{ old('yeu_cau_ho_so_dinh_kem') }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_spec" class="col-sm-3 col-form-label">Attach SPec</label>
            <div class="col-sm-8">
                <input name="attach_spec" type="file" class="form-control" id="attach_spec" required accept=".pdf, .doc, .docx">
                <span>Định dạng file: pdf, doc, docx</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_boq" class="col-sm-3 col-form-label">Attach Boq</label>
            <div class="col-sm-8">
                <input name="attach_boq" type="file" class="form-control" id="attach_boq" required accept=".pdf, .doc, .docx">
                <span>Định dạng file: pdf, doc, docx</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_ban_ve_ket_cau" class="col-sm-3 col-form-label">Attach bản vẽ kết cấu</label>
            <div class="col-sm-8">
                <input name="attach_ban_ve_ket_cau" type="file" class="form-control" id="attach_ban_ve_ket_cau" required accept=".pdf, .jpg, .jpeg, .png">
                <span>Định dạng file: pdf, jpg, jpeg, png</span>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $("#Linh_vuc_hoat_dong").change(function () {
                var idLinhvuc = $(this).val();
                $.get("{{ asset('getnganh/nganh') }}/" + idLinhvuc, function (data) {
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
    <script>
        var input1 = document.getElementById('min');
        input1.addEventListener('keyup', function(e)
        {
            input1.value = format_number(this.value);
            $('#truongaa').html(format_number(this.value));
        });

        var input2 = document.getElementById('max');
        input2.addEventListener('keyup', function(e)
        {
            input2.value = format_number(this.value);
            $('#truongbb').html(format_number(this.value));
        });
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