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

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="" class="sign__form">
							<a href="{{URL::to('/login')}}" class="sign__logo">
								<img src="{{asset('public/frontend/img/logo.png')}}" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Nhập email đăng nhập">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Tôi đã đọc kĩ và đồng ý với <a href="#">Chính sách bảo mật</a></label>
							</div>

							<button class="sign__btn" type="button">Gửi</button>

							<span class="sign__text">Chúng tôi sẽ gửi link reset mật khẩu, bạn vui lòng kiểm tra mail của bạn !</span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

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
