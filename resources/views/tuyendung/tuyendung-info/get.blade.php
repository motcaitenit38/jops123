    @extends('tuyendung.layouts.template')
    
    @section('noidung')

    <div id="main">                
        <div class="alert alert-success">{!! $info->tencongty !!}</div>
        <div class="alert alert-success">{!! $info->quymo !!} </div>
    </div>
    @foreach($info->nganhnghe as $abc)
    {{ $abc->tennganh}}
    @endforeach
    
    @endsection

    @section('script')

</script>
@endsection
