@extends('layout')
@section('content')
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{asset('public/frontend/img/normal-breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Đăng nhập</h2>
                        <p>Xin chào các bạn đã ghé thăm và test bug cùng chúng tôi !</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <?php
    $message = Session::get('message');
    if($message){
        echo '<p style="font-size:18px;color:red;text-align: center;" class="text-alert"><br>'.$message.'</br></p>';
        Session::put('message',null);
    }
    ?>

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Đăng nhập</h3>
                        <form action="{{URL::to('/login-user')}}" method="POST">
                            @csrf
                            <div class="input__item">
                                <input name="user_email" type="text" placeholder="Nhập email của bạn">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input name="user_pass" type="password" placeholder="Nhập password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Đăng nhập</button>
                        </form>
                        <a href="{{URL::to('/quen-mat-khau')}}" class="forget_pass">Bạn quên mật khẩu?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Bạn chưa có tài khoản?</h3>
                        <a href="{{URL::to('/dang-ky')}}" class="primary-btn">Đăng ký </a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection
