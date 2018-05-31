@extends('employer.template.app')
@section('title','Danh sách công việc đã đăng');
@section('content')
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th>Tên CV</th>
            <th>Link cv</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cv as $cv)
            <tr>
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