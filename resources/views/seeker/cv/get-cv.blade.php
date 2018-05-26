@extends('seeker.template.app')
@section('title','CV Của bạn')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="chat_container">
                <div class="job-box">
                    <div class="inbox-message">
                        <ul>
                            @foreach($cvs as $cv)
                            <li>
                                <a href="{{ asset('seeker/cv/'.$cv->id) }}">
                                    <div class="message-avatar">
                                        <img src="{{ $cv->user->avatar }}" alt="">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-body-heading">
                                            <h5>{{ $cv->name_cv }} <span class="unread">{{ $cv->career->career_name }}</span></h5>
                                            <span>7 hours ago</span>
                                        </div>
                                        <p>{{ $cv->description }}</p>
                                    </div>
                                </a>
                            </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection