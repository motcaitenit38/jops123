@extends('tuyendung.template.app')
@section('title','Danh sách công việc đã đăng');
@section('content')
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th>Công việc</th>
            <th>trạng thái</th>
            <th>Danh sách ƯV</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jop as $jop)
            <tr>
                <td>{{ $jop->jop_name }}</td>
                <td>@if($jop->deadline >= date('Y-m-d') ) Đang tuyển @else Đã hết hạn tuyển @endif</td>
                <td><a href="{{ url('employer/danhsachungvien/'.$jop->id)}}">xem danh sach</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection