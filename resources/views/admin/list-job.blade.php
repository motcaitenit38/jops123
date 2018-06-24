@extends('admin.layout.master')
@section('content2')
<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Danh sách công việc</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="admin"><i class="icon-home2 position-left"></i> Trang chủ</a></li>
							<li class="active">Trang Quản Lý</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
	<div class="content">
		<div class="row">
			<div class="col-12">
				<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Danh sách tài khoản <span class="badge badge-primary">{{$job->count()}}</span></h5>
						</div>

						
                        @if(session('thongbao'))
                        <div class="alert bg-success">
							<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
							<span class="text-semibold">Well done!</span>  {{session('thongbao')}}
						</div>
                        @endif
						<table class="table datatable-show-all">
							<thead>
								<tr class="bg-blue">
									<th>ID</th>
									
									<th>Tên công việc</th>
									<th>Hạn nộp hồ sơ</th>
									<th>Ngày đăng</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($job as $tk)
								<tr>
									<td>{{$tk->id}}</td>									
									<td><a href="{{ route('home.detail',$tk->id) }}" target="_blank"> {{$tk->ten_cong_viec}}</a></td>
									<td>{{$tk->thoi_gian_bao_gia}}</td>
									<td>{{$tk->created_at}}</td>
									
																		
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="admin/users/edit/{{$tk->id}}"><i class="icon-file-pdf"></i> Chỉnh sửa</a></li>
													<li><a href="admin/users/del/{{$tk->id}}"><i class="icon-file-excel"></i> Xóa</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
			</div>
		</div>
		
	</div>
</div>
@endsection