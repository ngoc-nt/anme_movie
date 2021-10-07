@extends('layout')
@section('content')
<section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Thể loại: </h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Lọc theo:</p>
                                        <select>
                                            <option value="{{Request::url()}}?sort_by=none">Mặc định</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_az">Tên (A - Z)</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_za">Tên (Z - A)</option>
                                            <option value="{{Request::url()}}?sort_by=tang_dan">View tăng dần (Thấp-&gt;Cao)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($movie_by_id as $key => $seri)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{URL::to('public/uploads/seri/'.$seri->seri_image)}}">
                                        <div class="ep">{{$seri->seri_number}} / {{$seri->seri_number}}</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{$seri->seri_views}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{$seri->category_name}}</li>
                                            <li>{{$seri->genre_name}}</li>
                                        </ul>
                                        <h5><a href="{{URL::to('/seri-phim',$seri->seri_name_slug)}}">{{$seri->seri_name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="product__pagination">
                        <ul class="pagination-box">
                            {{-- {{$seri->links('pagination::bootstrap-4') }} --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>
                            <ul class="filter__controls">
                                <li class="active" data-filter="*">Day</li>
                                <li data-filter=".week">Week</li>
                                <li data-filter=".month">Month</li>
                                <li data-filter=".years">Years</li>
                            </ul>
                            <div class="filter__gallery">
                                <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="{{asset('public/frontend/img/sidebar/tv-1.jpg')}}">
                                <div class="ep">11 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix month week"
                            data-setbg="{{asset('public/frontend/img/sidebar/tv-2.jpg')}}">
                            <div class="ep">12 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                    </div>
                    <div class="product__sidebar__view__item set-bg mix years month"
                    data-setbg="{{asset('public/frontend/img/sidebar/tv-4.jpg')}}">
                    <div class="ep">13 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix day"
                data-setbg="{{asset('public/frontend/img/sidebar/tv-5.jpg')}}">
                <div class="ep">14 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Fate stay night unlimited blade works</a></h5>
            </div>
        </div>
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>New Comment</h5>
        </div>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="{{asset('public/frontend/img/sidebar/comment-1.jpg')}}" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>
@endsection
