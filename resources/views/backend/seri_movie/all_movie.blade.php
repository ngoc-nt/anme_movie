@extends('admin_layout')
@section('admin_content')

<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Seri bộ phim</h2>

                    <span class="main__title-stat"> Hiển thị {{count($all_seri)}} bộ phim</span>

                    <div class="main__title-wrap">
                        <!-- filter sort -->
                        <div class="filter" id="filter__sort">
                            <span class="filter__item-label">Sort by:</span>

                            <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Date created">
                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
                                <li>Date created</li>
                                <li>Rating</li>
                                <li>Views</li>
                            </ul>
                        </div>
                        <!-- end filter sort -->

                        <!-- search -->
                        <form action="#" class="main__title-form">
                            <input type="text" placeholder="Tìm kiếm...">
                            <button type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>
                        </form>
                        <!-- end search -->
                    </div>
                </div>
            </div>
            <!-- end main title -->

            <!-- users -->
            <div class="col-12">
                <div class="main__table-wrap">
                    <table class="main__table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề seri phim</th>
                                <th>Thể loại phim</th>
                                <th>Danh mục phim</th>
                                {{-- <th>Mô tả phim</th> --}}
                                <th>Năm ra mắt</th>
                                <th>Thời lượng bộ phim</th>
                                <th>Chất lượng xem</th>
                                <th>Giới hạn tuổi</th>
                                <th>Ngôn ngữ/ Quốc gia</th>
                                <th>Số tập phim</th>
                                <th>Ảnh phim</th>
                                <th>Tình trạng</th>
                                <th><center>Thao tác</center></th>
                            </tr>
                        </thead>
                        @foreach($all_seri as $key => $all_seri)
                        <tbody>
                            <tr>
                                <td>
                                    <div class="main__table-text">{{$all_seri->seri_id}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text"><a href="">{{$all_seri->seri_name}}</a></div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$all_seri->category_name}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$all_seri->genre_name}}</div>
                                </td>
                                {{-- <td>
                                    <div class="main__table-text">{{$all_seri->seri_desc}}</div>
                                </td> --}}
                                {{-- <td>
                                    @php
                                     if($all_seri->seri_name==0){
                                    <div class="main__table-text main__table-text--green">Kích hoạt</div>
                                     }else
                                     <div class="main__table-text main__table-text--green">Ẩn</div>
                                    @endphp
                                </td> --}}
                                <td>
                                    <div class="main__table-text">{{$all_seri->seri_year}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$all_seri->seri_duration}} phút</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$all_seri->seri_quality}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$all_seri->seri_old}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$all_seri->seri_country}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$all_seri->seri_number}}</div>
                                </td>
                                <td>
                                    <img src ="public/uploads/seri/{{$all_seri->seri_image}}" heght="80" width="70">
                                </td>
                                <td>
                                    <?php
                                    if($all_seri->seri_status==0){
                                        ?>
                                          <div class="main__table-text main__table-text--red">Đã bị ẩn</div>
                                        </a>
                                        <?php
                                    }else{
                                        ?>
                                      <div class="main__table-text main__table-text--green">Hiển thị</div>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <div class="main__table-btns">
                                        <?php
                                         if($all_seri->seri_status==0){
                                          ?>
                                        <a href="{{URL::to('/active-seri-movie/'.$all_seri->seri_id)}}" class="main__table-btn main__table-btn--banned">
                                            <i class="icon ion-ios-lock"></i>
                                        </a>
                                        <?php
                                        }else{
                                        ?>
                                         <a href="{{URL::to('/unactive-seri-movie/'.$all_seri->seri_id)}}" class="main__table-btn main__table-btn--banned">
                                            <i class="icon ion-ios-unlock"></i>
                                        </a>
                                        <?php
                                        }
                                        ?>

                                        <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        <a href="{{URL::to('/edit-seri-movie/'.$all_seri->seri_id)}}" class="main__table-btn main__table-btn--edit">
                                            <i class="icon ion-ios-create"></i>
                                        </a>
                                        <a href="{{URL::to('/delete-seri-movie/'.$all_seri->seri_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bộ phim này?')" class="main__table-btn main__table-btn--delete">
                                            <i class="icon ion-ios-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- modal view -->
                            <div id="modal-view" class="zoom-anim-dialog mfp-hide modal modal--view">
                                <div class="reviews__autor">
                                    <img class="reviews__avatar" src="{{asset('public/backend/img/user.svg')}}" alt="">
                                    <span class="reviews__name">{{$all_seri->seri_name}}</span>
                                    <span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

                                    <span class="reviews__rating"><i class="icon ion-ios-star"></i></span>
                                </div>
                                <p class="reviews__text">{{$all_seri->seri_desc}}</p>
                            </div>
                            <!-- end modal view -->

                        </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
            <!-- end users -->

            <!-- paginator -->
            <div class="col-12">
                <div class="paginator-wrap">
                    <span>Hiển thị  sản phẩm.</span>

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                        </li>
                        <li class="paginator__item  paginator__item--active"><a href="#">1</a></li>
                        <li class="paginator__item"><a href="#">2</a></li>
                        <li class="paginator__item"><a href="#">3</a></li>
                        <li class="paginator__item"><a href="#">4</a></li>
                        <li class="paginator__item paginator__item--next">
                            <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
</main>
<!-- end main content -->
{{-- <!-- modal view -->
<div id="modal-view2" class="zoom-anim-dialog mfp-hide modal modal--view">
    <div class="reviews__autor">
        <img class="reviews__avatar" src="{{asset('public/backend/img/user.svg')}}" alt="">
        <span class="reviews__name">Best Marvel movie in my opinion</span>
        <span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

        <span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
    </div>
    <p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem
        Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
</div>
<!-- end modal view --> --}}

<!-- end modal delete -->
@endsection
