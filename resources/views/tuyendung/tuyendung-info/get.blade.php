    @extends('tuyendung.layouts.template')
    
    @section('noidung')
    <div id="main">

        @foreach($info as $info)
            <div class="alert alert-success">{!! $info->tencongty !!}</div>
            <div class="alert alert-success">{!! $info->quymo !!} </div>
        @foreach($tennganh as $nganh)
            <div class="alert alert-success">{{$nganh->tennganh}}</div>
        @endforeach
    </div>
    
    @endforeach
    @endsection

    @section('script')

</script>
@endsection
