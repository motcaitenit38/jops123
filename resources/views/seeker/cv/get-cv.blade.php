@extends('seeker.template.app')
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
                                    <img src="{{ url('/'.$cv->user_seeker->avatar) }}" class="img-responsive" alt=""/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="brows-job-position">
                                    <h3>{{ $cv->name_cv }}</h3>
                                    <p><span>{{ $cv->career->career_name }}</span><span class="brows-job-status"><strong>Trạng thái:</strong> {{ ($cv->status == 0) ? 'Kích hoạt'  : 'Ngừng kích hoạt' }}</span>
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
                                    <a class="edit" href="{{ url('seeker/cv/'.$cv->id.'/edit') }}" title="Edit"><i class="fa fa-pencil"
                                                                             aria-hidden="true"></i></a>
                                    <a class="delete" href="{{ url('seeker/cv/'.$cv->id) }}" title="Delete" onclick="event.preventDefault();
                                document.getElementById('delete-cv').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <form id="delete-cv" action="{{ url('seeker/cv/'.$cv->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
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