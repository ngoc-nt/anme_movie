@extends('layout')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href=""><i class="fa fa-home"></i> Home</a>
                    <a href="">Categories</a>
                    <a href="#">Seri phim</a>
                    {{-- <span>{{$name_movie->movie_name}}</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__video__player">
                    <video id="player" playsinline controls data-poster="{{asset('public/frontend/videos/anime-watch.jpg')}}">
                        <source src="https://scontent.cdninstagram.com/v/t66.36240-6/10000000_177481601167784_2083559115402149229_n.mp4?_nc_cat=1&ccb=1-5&_nc_sid=985c63&efg=eyJybHIiOjE2MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJvZXBfaGQifQu00253Du00253D&_nc_ohc=U7jf1kHOXikAX_lRnVp&rl=1600&vabr=1067&_nc_ht=scontent-amt2-1.xx&edm=APRAPSkEAAAA&oh=503b30e29bb5274b60ba7c99675b3085&oe=615B4ECB" type="video/mp4" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                </div>
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>Các tập</h5>
                    </div>
                    @foreach($movie_by_id as $key => $value)
                    <a href="{{URL::to('/xem-tap-phim',$value->movie_slug)}}">{{$value->movie_name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{asset('public/frontend/img/anime/review-1.jpg')}}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre "demons" LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{asset('public/frontend/img/anime/review-2.jpg')}}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                            <p>Finally it came out ages ago</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{asset('public/frontend/img/anime/review-3.jpg')}}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                            <p>Where is the episode 15 ? Slow update! Tch</p>
                        </div>
                    </div>
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="#">
                        <textarea placeholder="Your Comment"></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->
@endsection
