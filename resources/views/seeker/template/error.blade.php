{{-- thông báo thành công --}}
<div class="container">
    <div class="row text-center">
        @if(session('alert')== 'danger')
            @if(session('thongbao'))
                <div class="alert alert-{{ session('alert') }}">
                    <strong>Thông báo!</strong> {{ session('thongbao') }}!
                </div>
            @endif
        @elseif(session('alert')== 'success')
            <div class="alert alert-{{ session('alert') }}" id="thongbao">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <strong>Thông báo!</strong> {{ session('thongbao') }}!
            </div>
        @endif
    </div>
</div>
{{-- thông báo tất cả các lỗi --}}
<div class="container">
    <div class="row">
        @if(count($errors)>0)
            <div class="alert alert-danger col-md-12" role="alert">
                <ul>
                    @foreach($errors->all() as $er)
                        <li>{{$er}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>