@extends('employer.template.app')
@section('title','Sửa công việc')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('jop.update', $jop->id) }}" enctype="multipart/form-data" role="form">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="jop_name" class="col-sm-3 col-form-label">Tên công việc</label>
            <div class="col-sm-8">
                <input name="jop_name" type="text" class="form-control" id="jop_name" placeholder="Tên công việc" value="{{ $jop->jop_name }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Nơi làm việc</label>
            <div class="col-sm-8">
                <select name="address" id="address" class="form-control">
                    @foreach($address as $address)
                        <option value="{{ $address->thanhpho_id }}"
                                @if($jop->address_id == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="form_work" class="col-sm-3 col-form-label">Hình thức làm việc</label>
            <div class="col-sm-8">
                <select name="form_work" id="form_work" class="form-control">
                    @foreach($form_work as $form_work)
                        <option value="{{ $form_work->form_work_id }}"
                                @if($jop->form_work_id == $form_work->form_work_id) selected @endif>{{ $form_work->form_work_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="position" class="col-sm-3 col-form-label">Cấp bậc</label>
            <div class="col-sm-8">
                <select name="position" id="position" class="form-control">
                    @foreach($position as $position)
                        <option value="{{ $position->position_id }}"
                                @if($jop->position_id == $position->position_id) selected @endif>{{ $position->position_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="career" class="col-sm-3 col-form-label">Ngành nghề</label>
            <div class="col-sm-8">
                <select name="career[]" multiple="multiple" id="career" class="form-control career" required >
                    @foreach($careers as $career)
                        <option value="{{ $career->id }}" {{ array_key_exists($career->id, $career_jop) ? 'selected' : '' }} >{{$career->career_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="academic_level" class="col-sm-3 col-form-label">Trình độ học vấn</label>
            <div class="col-sm-8">
                <select name="academic_level" id="academic_level" class="form-control">
                    @foreach($academic as $academic)
                        <option value="{{ $academic->academic_level_id }}"
                                @if($jop->academic_level_id == $academic->academic_level_id) selected @endif>{{ $academic->academic_level_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="experience" class="col-sm-3 col-form-label">Kinh nghiệm làm việc</label>
            <div class="col-sm-8">
                <select name="experience" id="experience" class="form-control">
                    @foreach($experience as $experience)
                        <option value="{{ $experience->experience_id }}"
                                @if($jop->experience_id == $experience->experience_id) selected @endif>{{ $experience->experience_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="salary_level" class="col-sm-3 col-form-label">Mức lương</label>
            <div class="col-sm-8">
                <select name="salary_level" id="salary_level" class="form-control">
                    @foreach($salary_level as $salary_level)
                        <option value="{{ $salary_level->salary_level_id }}"
                                @if($jop->salary_level_id == $salary_level->salary_level_id) selected @endif>{{ $salary_level->salary_level_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="jop_detail" class="col-sm-3 col-form-label">Chi tiết công việc</label>
            <div class="col-sm-8">
                <textarea name="jop_detail" type="text" class="form-control" id="jop_detail"
                          placeholder="Chi tiết công việc" rows="6" required>{{ $jop->jop_details }}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="jop_requirement" class="col-sm-3 col-form-label">Yêu cầu công việc</label>
            <div class="col-sm-8">
                <textarea name="jop_requirement" type="text" class="form-control" id="jop_requirement"
                          placeholder="Yêu cầu chi tiết" value="{{ old('jop_requirement') }}" rows="6" required>{{ $jop->jop_requirements }}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="benefits" class="col-sm-3 col-form-label">Phúc lợi</label>
            <div class="col-sm-8">
                <textarea name="benefits" type="text" class="form-control" id="benefits"
                          placeholder="Phúc lợi khi làm việc" value="{{ old('benefits') }}" rows="6" required>{{ $jop->benefits }}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="deadline" class="col-sm-3 col-form-label">Hạn nộp hồ sơ</label>
            <div class="col-sm-3">
                <input name="deadline" type="date" class="form-control" id="deadline" placeholder="Người liên hệ" value="{{ $jop->deadline }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="contact" class="col-sm-3 col-form-label">Người liên hệ</label>
            <div class="col-sm-8">
                <input name="contact" type="text" class="form-control" id="contact" placeholder="Người liên hệ" value="{{ $jop->contact }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="contact_email" class="col-sm-3 col-form-label">Email người liên hệ</label>
            <div class="col-sm-8">
                <input name="contact_email" type="text" class="form-control" id="contact_email"
                       placeholder="Người liên hệ" value="{{ $jop->contact_email }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="contact_phone" class="col-sm-3 col-form-label">Điện thoại người liên hệ</label>
            <div class="col-sm-8">
                <input name="contact_phone" type="text" class="form-control" id="contact_phone"
                       placeholder="Người liên hệ" value="{{ $jop->contact_phone }}" required/>
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
            $("#thanhpho").change(function () {
                var idThanhpho = $(this).val();
                $.get("{{ asset('diachi/quanhuyen') }}/" + idThanhpho, function (data) {
                    $("#quanhuyen").html(data);
                });
            });
            $("#quanhuyen").change(function () {
                var idquanhuyen = $(this).val();
                $.get("{{ asset('diachi/xaphuong') }}/" + idquanhuyen, function (data) {
                    $("#xaphuong").html(data);
                });
            });
        });
    </script>
@endsection