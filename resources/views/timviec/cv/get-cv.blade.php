@extends('timviec.template.app')
@section('title','CV Của bạn')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="chat_container">
                <div class="job-box">
                    @foreach($cvs as $cv)
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-1 col-sm-2 small-padding">
                                    <div class="brows-job-company-img">
                                        <img src="" class="img-responsive" alt=""/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-5">
                                    <div class="brows-job-position">
                                        <h3>{{ $cv->ten_cv }}</h3>
                                        <p><span>{{ $cv->nganh->ten_nganh }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>{{ $cv->address->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="job-action">
                                        <a class="edit" href="{{ url('timviec/cvtimviec/'.$cv->id.'/edit') }}"
                                           title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a class="delete" href="#" title="Delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            <input style="display: none;" type="text" id="cv_id" name="cv_id"
                                                   value="{{ $cv->id }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").on("click", ".delete", function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '{{ route('timviec.xoacv') }}',
                    'data': {
                        'id_cv': $(this).find('#cv_id').val()
                    },
                    'type': 'POST',
                    success: function (data) {
                        console.log(data);
                        if (data.error == true) {

                        } else {
                            alert('Xóa thành công');
                            location.reload();
                        }
                    }
                });
            })
        });
    </script>
@endsection