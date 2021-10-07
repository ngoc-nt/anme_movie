<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dmitryvolkov.me/demo/hotflix2.1/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Sep 2021 08:37:22 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Website xem phim mùa dịch, do 1 sinh viên rảnh rỗi làm. " />
    <meta name="csrf-token" content="{{csrf_token()}}">

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
	<!-- header -->
	<header class="header">
		<div class="header__content">
			<!-- header logo -->
			<a href="" class="header__logo">
				<img src="{{asset('public/backend/img/logo.svg')}}" alt="">
			</a>
			<!-- end header logo -->

			<!-- header menu btn -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- end header menu btn -->
		</div>
	</header>
	<!-- end header -->

	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="{{URL::to('/dashboard')}}" class="sidebar__logo">
			<img src="{{asset('public/frontend/img/logo.png')}}" alt="Anh web">
		</a>
		<!-- end sidebar logo -->

		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="{{asset('public/backend/img/user.svg')}}" alt="Ảnh đại diện ">
			</div>

			<div class="sidebar__user-title">
				<span>Admin</span>
				<p>Xin chào:
                    @if(Auth::user())
                    <?php
                    $name = Auth::user()->admin_name;
                    if($name){
                        echo $name;
                    }
                    ?>
                    @endif
                </p>
			</div>
			{{-- <button class="sidebar__user-btn" type="button">
				<a href="{{URL::to('/logout')}}"><i class="icon ion-ios-log-out"></i></a>
			</button> --}}
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<div class="sidebar__nav-wrap">
			<ul class="sidebar__nav">
				<li class="sidebar__nav-item">
					<a href="{{URL::to('/dashboard')}}" class="sidebar__nav-link sidebar__nav-link--active"><i class="icon ion-ios-keypad"></i> <span>Dashboard</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="{{URL::to('/add-banner')}}" class="sidebar__nav-link"><i class="icon ion-ios-film"></i> <span>Banner phim mới </span></a>
				</li>

                <!-- collapse -->
				<li class="sidebar__nav-item">
					<a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu"><i class="icon ion-ios-copy"></i> <span>Bộ phim</span> <i class="icon ion-md-arrow-dropdown"></i></a>

					<ul class="collapse sidebar__menu" id="collapseMenu">
						<li><a href="{{URL::to('/add-seri-movie')}}">Thêm seri phim mới</a></li>
                        <li><a href="{{URL::to('/add-movie')}}">Thêm tập phim mới</a></li>
						<li><a href="{{URL::to('/all-seri-movie')}}">Tất cả seri film</a></li>
						<li><a href="{{URL::to('/all-movie')}}">Tất cả tập film</a></li>
					</ul>
				</li>
				<!-- end collapse -->


				<li class="sidebar__nav-item">
					<a href="{{URL::to('/all-users')}}" class="sidebar__nav-link"><i class="icon ion-ios-contacts"></i> <span>Quản lý người dùng</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="{{URL::to('/all-comment')}}" class="sidebar__nav-link"><i class="icon ion-ios-chatbubbles"></i> <span>Bình Luận</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="reviews.html" class="sidebar__nav-link"><i class="icon ion-ios-star-half"></i> <span>Đánh giá</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="{{URL::to('/logout')}}" class="sidebar__nav-link"><i class="icon ion-ios-arrow-round-back"></i> <span>Quay trở lại trang Login</span></a>
				</li>
			</ul>
		</div>
		<!-- end sidebar nav -->

		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© Anime247, 2020—2021. <br>Phát triển bởi <a href="" target="_blank">Nguyễn Tuấn Ngọc</a></div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->

	<!-- main content -->
    @yield('admin_content')
	<!-- end main content -->

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

    <script type="text/javascript">
        $('.comment_duyet_btn').click(function(){
            var comment_status = $(this).data('comment_status');

            var comment_id = $(this).data('comment_id');
            var seri_id = $(this).attr('seri_id');
            if(comment_status==0){
                var alert = 'Thay đổi thành duyệt thành công';
            }else{
                var alert = 'Thay đổi thành không duyệt thành công';
            }
            $.ajax({
                    url:"{{url('/allow-comment')}}",
                    method:"POST",

                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{comment_status:comment_status,comment_id:comment_id,seri_id:seri_id},
                    success:function(data){
                        location.reload();
                    $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');

                    }
                });
        });
    </script>
</body>

</html>
