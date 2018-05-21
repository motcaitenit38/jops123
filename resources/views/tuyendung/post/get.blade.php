@extends('tuyendung.template.app')
@section('title','Danh sách công việc đã đăng')
@section('noidung')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="chat_container">
				@foreach($danhsachbaidang as $danhsach)
				<article>
					<div class="brows-job-list">
						<div class="col-md-1 col-sm-2 small-padding">
							<div class="brows-job-company-img">
								<img src="assets/img/com-1.jpg" class="img-responsive" alt="" />
							</div>
						</div>
						<div class="col-md-6 col-sm-5">
							<div class="brows-job-position">
								<h3>{{ $danhsach->tencongviec }}</h3>
								<p><span class="brows-job-status"><strong>Ngày đăng:</strong> {{ date('d-m-Y', strtotime($danhsach->created_at)) }}</span></p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker">Hạn nộp hồ sơ:</i>{{ date('d-m-Y', strtotime($danhsach->time_nophoso)) }}</p>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<div class="job-action">
								<a class="edit" href="{{ asset('tuyendung/post/'.$danhsach->id.'/edit') }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="delete" href="{{ asset('tuyendung/post/'.$danhsach->id.'/edit') }}" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</article>
				@endforeach
				
				<!--row Pagination-->
				<div class="row">
					<ul class="pagination">
						{!! $danhsachbaidang->links() !!}
					</ul>
				</div>
				<!--./row Pagination-->
			</div>
		</div>
	</div>
	<!-- /. ROW  -->
</div>
@endsection