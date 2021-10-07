@section('banner')
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach($banner as $key => $slider)
            <div class="hero__items set-bg" data-setbg="{{URL::to('public/uploads/banner/'.$slider->banner_images)}}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{$slider->banner_name}}</div>
                            <h2>{{$slider->banner_name}}</h2>
                            <p>Bộ phim hay nhất trong năm....</p>
                            <a href="{{$slider->banner_url}}"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
