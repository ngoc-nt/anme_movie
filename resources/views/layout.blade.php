<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />


<head>
    <meta charset="UTF-8">
    <meta name="description" content="Phim anime do NTN phát triển">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://riday-admin-template.multipurposethemes.com/bs4/images/favicon.ico">
    <title>Anime | Nguyễn Tuấn Ngọc</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{URL::to('/')}}">
                            <img src="{{asset('public/frontend/img/logo.png')}}" alt="Anime 24/7">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li><a href="">Danh mục phim <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">

                                        @foreach($category as $key => $cate)
                                        <li><a style="width:200px" href="{{URL::to('/danh-muc/'.$cate->category_slug)}}">{{$cate->category_name}}</a></li>
                                        @endforeach


                                    </ul>
                                </li>
                                <li><a href="">Thể loại phim <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">

                                        @foreach($genre as $key => $genre)
                                        <li><a href="{{URL::to('/the-loai/'.$genre->genre_slug)}}">{{$genre->genre_name}}</a></li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li>
                                    <a href="">Tin tức</a>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>

                    <?php
                        $customer_id = Session::get('customer_id');
                        $customer_name = Session::get('customer_name');
                        if($customer_id!=NULL){
                        ?>
                        <div class="col-lg-2">
                            <div class="header__right">
                                <a class="search-switch"><span class="icon_search"></span></a>
                                <a href="{{URL::to('/dang-xuat')}}"><span class="icon_profile"></span></a>
                            </div>
                        </div>
                        <?php
                        }else{
                        ?>
                        <div class="col-lg-2">
                            <div class="header__right">
                                <a class="search-switch"><span class="icon_search"></span></a>
                                <a href="{{URL::to('/dang-nhap')}}"><span class="icon_profile"></span></a>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    @php
        echo(Session::get('customer_id'));
    @endphp
    <!-- Hero Section Begin -->
    @yield('banner')
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    @yield('content')
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="index.html"><img src="{{asset('public/frontend/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="index.html">Homepage</a></li>
                            <li><a href="categories.html">Categories</a></li>
                            <li><a href="blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Phát triển bởi <i class="fa fa-heart" aria-hidden="true"></i><a href="" target="_blank"> NTN Dev 17</a>

                    </p>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <p style="color:red;font-size:18px;text-align: center;">
                        Chú ý: Website được phát triển bởi 1 SV mới ra trường đang WFH vì Covid, không có mục đích thương mại. Xin cảm ơn!
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form action="{{URL::to('/tim-kiem')}}" method="POST" class="search-model-form">
                @csrf
                <input type="text" name="keywords" id="search-input" placeholder="Tìm kiếm bộ phim...">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/player.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            load_comment();

            function load_comment(){
                var seri_id = $('.comment_seri_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/load-comment')}}",
                    method:"POST",
                    data:{seri_id:seri_id, _token:_token},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
                });
            }
            $('.sent-comment').click(function(){
                // alert("The text has been changed.");
                var seri_id = $('.comment_seri_id').val();
                var comment_name =  $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $('input[name="_token"]').val();
                // alert(comment_name);
                    $.ajax({
                            url:"{{url('/send-comment')}}",
                            method:"POST",
                            data:{seri_id:seri_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
                            success:function(data){
                                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                                load_comment();
                                alert('Thêm bình luận thành công, bình luận đang chờ duyệt');
                                $('#notify_comment').fadeOut(9000);
                                $('.comment_name').val('');
                                $('.comment_content').val('');
                            }
                    });
                // if(comment_name!=NULL){
                //     $.ajax({
                //         url:"{{url('/send-comment')}}",
                //         method:"POST",
                //         data:{seri_id:seri_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
                //         success:function(data){
                //             $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                //             load_comment();
                //             $('#notify_comment').fadeOut(9000);
                //             $('.comment_name').val('');
                //             $('.comment_content').val('');
                //         }
                //     });
                //     else{
                //         alert('Bình luận không được chấp thuận do chưa đăng nhập,')
                //     }
                // }
            });
        });
    </script>
    <script>
    $(document).ready(function(){
      $(".sort").on('change',function(){
            // var url = $(this).val();
            // if (url) {
            //     window.location = url;
            // }
        alert("The text has been changed.");
      });
    });
    </script>



</body>


</html>
