@extends('seeker.template.app')
@section('title','Tạo mới CV')
@section('content')
    <form id="post-form" class="form-group col-md-12" method="post" action="{{ route('cv.store') }}" enctype="multipart/form-data" role="form">
        @csrf
        <div class="form-group row">
            <label for="name_cv" class="col-sm-3 col-form-label">Tên CV</label>
            <div class="col-sm-8">
                <input name="name_cv" type="text" class="form-control" id="name_cv" placeholder="Tên công việc"
                       value="{{ old('name_cv') }}" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
                <select name="address" id="address" class="form-control">
                    @foreach($address as $address)
                        <option value="{{ $address->thanhpho_id }}"
                                @if(old('address') == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
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
                                @if(old('form_work') == $form_work->form_work_id) selected @endif>{{ $form_work->form_work_name }}</option>
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
                                @if(old('position') == $position->position_id) selected @endif>{{ $position->position_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="career" class="col-sm-3 col-form-label">Ngành nghề</label>
            <div class="col-sm-8">
                <select name="career" id="career" class="form-control career" required>
                    @foreach($careers as $career)
                        <option value="{{ $career->id }}"
                                @if(old('carrer') == $career->id) selected @endif>{{$career->career_name}}</option>
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
                                @if(old('academic_level') == $academic->academic_level_id) selected @endif>{{ $academic->academic_level_name }}</option>
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
                                @if(old('experience') == $experience->experience_id) selected @endif>{{ $experience->experience_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Giới thiệu về bản thân</label>
            <div class="col-sm-8">
                <textarea name="description" type="text" class="form-control" id="description" rows="6" required>{{ old('description') }}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="attach_file" class="col-sm-3 col-form-label">Đính kèm file CV</label>
            <div class="col-sm-8">
                <input name="attach_file" type="file" class="form-control" id="attach_file" value="{{ old('attach_file') }}" required/>
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