    @extends('tuyendung.layouts.template')
    
    @section('noidung')
    
    @foreach($info as $info)
    <div class="alert alert-success">{!! $info->tencongty !!}</div>
    
    <div class="alert alert-success">{!! $info->quymo !!} </div>
    @endforeach
    
    @endsection
    
    @section('script')
    
  </script>
  @endsection
