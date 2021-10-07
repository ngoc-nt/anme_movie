<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dmitryvolkov.me/demo/hotflix2.1/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Sep 2021 08:37:22 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/css/admin.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


	<!-- Favicons -->
	{{-- <link rel="icon" type="image/png" href="{{asset('public/backend/icon/favicon-32x32.png')}}" sizes="32x32"> --}}
    <link rel="icon" href="https://riday-admin-template.multipurposethemes.com/bs4/images/favicon.ico">
	<link rel="apple-touch-icon" href="{{asset('public/backend/icon/favicon-32x32.png')}}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>Trang quản trị website phim Anime247</title>

</head>
<body>
	<!-- page 404 -->
	<div class="page-404 section--bg" data-bg="{{asset('public/backend/img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-404__wrap">
						<div class="page-404__content">
							<h1 class="page-404__title">404</h1>
							<p class="page-404__text">Không thể tìm thấy trang web bạn yêu cầu! </p>
							<a href="{{URL::to('/dashboard')}}" class="page-404__btn">Quay trở lại trang chủ</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page 404 -->

	<!-- JS -->
	<script src="{{asset('public/backend/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.mousewheel.min.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.mCustomScrollbar.min.js')}}"></script>
	<script src="{{asset('public/backend/js/select2.min.js')}}"></script>
	<script src="{{asset('public/backend/js/admin.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
