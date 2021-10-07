@extends('layout')
@section('content')

 <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="categories.html">Seri phim</a>
                    <span>{{$seriMovie->seri_name}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
    <section class="anime-details spad">
    @foreach($details_seri as $key => $details_seri)
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{URL::to('public/uploads/seri/'.$details_seri->seri_image)}}">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> {{$details_seri->seri_views}}</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{$details_seri->seri_name}}</h3>
                            <span>{{$details_seri->seri_name_slug}} (phim dành cho {{$details_seri->seri_old}}+ )</span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>...Đánh giá</span>
                        </div>
                        <p>{{$details_seri->seri_desc}}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Ngôn ngữ:</span> {{$details_seri->seri_country}}</li>
                                        <li><span>Danh mục:</span> {{$details_seri->category_name}}</li>
                                        <li><span>Khởi chiếu:</span> {{$details_seri->seri_year}}</li>
                                        <li>
                                            @php
                                                if($details_seri->seri_status == 0){
                                                    ?>
                                                        <span>Tình trạng phát:</span> Ngưng khởi chiếu
                                                        <?php
                                                }
                                                else {
                                                    ?>
                                                        <span>Tình trạng phát:</span> Đang khởi chiếu
                                                    <?php
                                                }
                                            @endphp

                                        </li>
                                        <li><span>Thể loại:</span> {{$details_seri->genre_name}}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Số tập:</span> {{count($seriMovie->movies)}} / {{$details_seri->seri_number}}</li>
                                        <li><span>Rating:</span>{{$details_seri->seri_old}}</li>
                                        <li><span>Thời lượng:</span> {{$details_seri->seri_duration}} phút/tập</li>
                                        <li><span>Chất lượng:</span> {{$details_seri->seri_quality}}</li>
                                        <li><span>Lượt xem:</span> {{$details_seri->seri_views}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Theo dõi</a>
                            <a href="{{URL::to('/xem-phim',$details_seri->seri_name_slug)}}" class="watch-btn"><span>Xem ngay</span> <i
                                class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Đánh giá:</h5>
                        </div>
                        <div id="comment_show"></div>
                        {{-- <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                 <img src="'.url('/public/frontend/image/user.png').'" alt="Admin">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>'.$comm->comment_date.'</span></h6>
                                <p></p>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=852484398680038&autoLogAppEvents=1" nonce="zNxCFHF8">
                    </script>
                    <div class="fb-comments"  style="color:#13aa0e;" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="20"></div> --}}
                    <div class="anime__details__form">
                        <div class="section-title">
                            <?php
                                $customer_name = Session::get('customer_name');
                                if($customer_name!=NULL){
                                ?>
                                    <h5>Bình luận với tên: {{$customer_name}} </h5>
                                <?php
                                }else{
                                ?>
                                    <h5>Bạn cần đăng nhập để bình luận => Đăng nhập <a href="{{URL::to('/dang-nhap')}}" target="">tại đây.</a> </h5>
                                <?php
                                }
                            ?>
                        </div>


                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="comment_name" class="comment_name" value="{{$customer_name}}">
                            <input type="hidden" name="comment_seri_id" class="comment_seri_id" value="{{$details_seri->seri_id}}">
                            <textarea name="comment_content" class="comment_content" placeholder="Bạn muốn bình luận về bộ phim,đánh giá nhập tại đây.."></textarea>
                            <button class="sent-comment" type="button"><i class="fa fa-location-arrow"></i> Gửi đánh giá</button>
                        </form>
                        <div style="front-size:18px;margin-bottom: 10px;" id="notify_comment"></div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>Bạn có thể thích....</h5>
                        </div>

                        <div class="product__sidebar__view__item set-bg" data-setbg="{{asset('public/frontend/img/sidebar/tv-1.jpg')}}">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>

                 </div> --}}
            </div>
        </div>
    </div>
    @endforeach
    </section>

@endsection
