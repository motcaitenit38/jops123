<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx">

	@include('tuyendung.template.head')

	<body>
		<div id="wrapper">
			@include('tuyendung.template.menutop')
			<!-- /. NAV TOP  -->
			@include('tuyendung.template.menutrai')
			<div id="page-wrapper">
				<div class="row bg-title">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h4 class="page-title">@yield('title')</h4>
					</div>
				</div>
				@include('tuyendung.template.error')
				<!-- /. ROW  -->
				<div id="page-inner">
					
					@yield('noidung')
					
				</div>
			</div>
			<!-- /. PAGE WRAPPER  -->
			@include('tuyendung.template.footer')
			
		</div>
		<!-- /. WRAPPER  -->
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		@include('tuyendung.template.script')

		@yield('script')
		
	</body>
</html>