@extends('tuyendung.template.app')
@section('title','Danh sách công việc đã đăng');
@section('content')
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th>Họ tên ứng viên</th>
            <th>số đt ứng viên</th>
            <th>Tên CV</th>
            <th>Link cv</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cv as $cv)
            <tr>
                <td>{{ $cv->user_seeker->name }}</td>
                <td>{{ $cv->user_seeker->phone_number }}</td>
                <td>{{ $cv->name_cv }}</td>
                <td><a href="{{ asset($cv->attach_cv) }}">Tải CV</a></td>
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