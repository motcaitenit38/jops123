@extends('timkiem.template.app')
@section('formtimkiem')
<form class="form-horizontal" action="{{ route('home.search') }}" method="GET">
    <div class="col-md-7 no-padd">
        <div class="input-group">
            <input type="text" class="form-control right-bor" placeholder="Công việc bạn quan tâm" name="search">
        </div>
    </div>
    <div class="col-md-3 no-padd">
        <div class="input-group">
            <select class="form-control" name="diachi">
                @foreach($tinh as $tinh)
                <option value="{{ $tinh->thanhpho_id }}">{{ $tinh->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2 no-padd">
        <div class="input-group">
            <button type="submit" class="btn btn-primary">Search Job</button>
        </div>
    </div>
</form>
@endsection