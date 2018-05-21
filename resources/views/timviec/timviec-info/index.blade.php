@extends('timviec.template.app')
@section('title','Danh sách hồ sơ')
@section('noidung')
<div class="row">
	<div class="col-md-12">
		<div class="chat_container">
			<div class="job-box">	
			@foreach($danhsachhosos as $danhsachhoso)			
				<article>
					<div class="brows-job-list">
						<div class="col-md-1 col-sm-2 small-padding">
							<div class="brows-job-company-img">
								<img src="assets/img/com-1.jpg" class="img-responsive" alt="" />
							</div>
						</div>
						<div class="col-md-6 col-sm-5">
							<div class="brows-job-position">
								<h3>{{ $danhsachhoso->tieudehoso }}</h3>								
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<div class="job-action">
								<a class="edit" href="{{ asset('timviec/info-timviec/'.$danhsachhoso->id.'/edit') }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="delete" href="#" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</article>
				@endforeach
				<!--row Pagination-->
				<div class="row">
					<ul class="pagination">
						{{ $danhsachhosos->links() }}
					</ul>
				</div>
				<!--./row Pagination-->
			</div>
		</div>
	</div>
</div>
<!-- /. ROW  -->
</div>
@endsection