{{-- thông báo thành công --}}
<div class="container">
  <div class="row text-center">
    @if(isset($alert))
    @if(isset($thongbao))
    <div class="alert alert-{{ $alert }} col-md-12 thongbao" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Thông báo!</strong> {{ $thongbao }}
    </div>
    @endif
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