{{-- thông báo thành công --}}
<div class="row text-center">
    @if (session('danger'))
        <div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!</strong> {{ session('danger') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissable fade in" id="thongbao">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ session('danger') }}
        </div>
    @endif
</div>

{{-- thông báo tất cả các lỗi --}}
<div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
