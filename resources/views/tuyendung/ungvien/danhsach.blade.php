@extends('tuyendung.template.app')
@section('title','Danh sách ứng viên');
@section('content')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="chat_container">
                    @foreach($danhsach as $danhsach)
                        <article @if(in_array($danhsach->id,$truong)) style="background: red" @endif>
                            <div class="brows-job-list">
                                <div class="col-md-1 col-sm-2 small-padding">
                                    <div class="brows-job-company-img">
                                        <img src="assets/img/com-1.jpg" class="img-responsive" alt=""/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-5">
                                    <div class="brows-job-position">
                                        <h3><a href="{{ url('tuyendung/chitietungvien/'.$danhsach->id.'/'.$id_job) }}"
                                               target="_blank" id="modelchitiet">{{ $danhsach->ten_cv }}</a>
                                        </h3>
                                        <p>
                                            <span class="brows-job-status"><strong>Ngành:</strong> {{$danhsach->nganh->ten_nganh}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="brows-job-location">
                                        <p>
                                            <i class="fa fa-map-marker">Ngày ứng
                                                tuyển:</i>{{ date('d-m-Y', strtotime($danhsach->created_at)) }}
                                        </p>
                                        <p>
                                            <a href="{{ url('tuyendung/chitietungvien/'.$danhsach->id.'/'.$id_job) }}"
                                               target="_blank" id="modelchitiet" type="button" class="btn btn-warning">Chi
                                                tiết
                                                hồ sơ</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="job-action">
                                        <p>
                                            <a class="btn btn-success chapnhan" href="#" title="Edit" type="button" style="height: 50px;text-align: center;padding-top: 15px;" @if(in_array($danhsach->id,$truong)) disabled @endif>@if(in_array($danhsach->id,$truong)) Trúng tuyến @else Chấp nhận ứng viên @endif
                                                <input style="display: none;" type="text" id="job_id" name="job_id"
                                                       value="{{ $id_job }}">
                                                <input style="display: none;" type="text" id="cv_id" name="cv_id"
                                                       value="{{ $danhsach->id }}">
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                @endforeach
                <!--row Pagination-->
                {{--<div class="row">--}}
                {{--<ul class="pagination">--}}
                {{--{!! $danhsach->links() !!}--}}
                {{--</ul>--}}
                {{--</div>--}}
                <!--./row Pagination-->
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $("body").on("click",".chapnhan",function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ route('tuyendung.chapnhanungvien') }}',
                    'data': {
                        'job_id': $(this).find('#job_id').val(),
                        'cv_id': $(this).find('#cv_id').val()
                    },
                    'type': 'POST',
                    success: function (data) {
                        console.log(data);
                        if (data.error == true) {

                        } else {
                            location.reload();
                        }
                    }
                });
            })
        });
    </script>

@endsection