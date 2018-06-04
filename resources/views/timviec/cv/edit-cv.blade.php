@extends('timviec.template.app')
@section('title','Sửa CV')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('cvtimviec.update',$cv->id) }}"
          enctype="multipart/form-data" role="form">
        @method('PUT')
        @csrf

        <div class="form-group row">
            <label for="ten_cv" class="col-sm-3 col-form-label">Tên CV</label>
            <div class="col-sm-8">
                <input name="ten_cv" type="text" class="form-control" id="ten_cv" placeholder="Tên công việc"
                       value="{{ $cv->ten_cv }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="diachi_id" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                <select name="diachi_id" id="diachi_id" class="form-control">
                    @foreach($address as $address)
                        <option value="{{ $address->thanhpho_id }}"
                                @if($cv->diachi_id == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="Linh_vuc_hoat_dong" class="col-sm-3 col-form-label">Lĩnh vực hoạt động</label>
            <div class="col-sm-8">
                <select name="Linh_vuc_hoat_dong" id="Linh_vuc_hoat_dong" class="form-control">
                    <option> Chọn lĩnh vực cần tuyển</option>
                    @foreach($linhvuc as $linhvuc)
                        <option value="{{ $linhvuc->id }}">{{ $linhvuc->ten_linh_vuc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="career" class="col-sm-3 col-form-label">Ngành</label>
            <div class="col-sm-8">
                <select name="nganh_id" id="career" class="form-control career" required>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="gia_tri_hop_dong_lon" class="col-sm-3 col-form-label">Giá trị hợp đồng lớn</label>
            <div class="col-sm-8">
                <input name="gia_tri_hop_dong_lon" type="text" class="form-control" id="gia_tri_hop_dong_lon"
                       placeholder="Tên công việc"
                       value="{{ $cv->gia_tri_hop_dong_lon }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="so_nam_kinh_nghiem" class="col-sm-3 col-form-label">Số năm kinh nghiệm</label>
            <div class="col-sm-8">
                <input name="so_nam_kinh_nghiem" type="text" class="form-control" id="so_nam_kinh_nghiem"
                       placeholder="Tên công việc"
                       value="{{ $cv->so_nam_kinh_nghiem }}" required/>
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
            <label for="gioi_thieu" class="col-sm-3 col-form-label">Giới thiệu về cv</label>
            <div class="col-sm-8">
                <textarea name="gioi_thieu" type="text" class="form-control" id="editor" placeholder="Yêu cầu chi tiết"
                          required>{{ $cv->gioithieu }}
                 </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="dangtin" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="form-control btn btn-success" id="company_name">Cập nhật CV</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
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
    <script type="text/javascript">
        var allEditors = document.querySelectorAll('#editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }
    </script>
@endsection