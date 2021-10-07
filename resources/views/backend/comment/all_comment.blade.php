@extends('admin_layout')
@section('admin_content')
<!-- main content -->
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div id="notify_comment"></div>
            <div class="col-12">
                <div class="main__title">
                    <h2>Bình luận</h2>

                    <span class="main__title-stat">Hiện thị... bình luận</span>

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
                            </ul>
                        </div>
                        <!-- end filter sort -->

                        <!-- search -->
                        <form action="#" class="main__title-form">
                            <input type="text" placeholder="Key word..">
                            <button type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>
                        </form>
                        <!-- end search -->
                    </div>
                </div>
            </div>
            <!-- end main title -->

            <!-- comments -->
            <div class="col-12">
                <div class="main__table-wrap">
                    <table class="main__table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Seri phim</th>
                                <th>Tên người gửi</th>
                                <th>Nội dung đánh giá</th>
                                <th>Tình trạng comment</th>
                                <th>Ngày bình luận</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($comment as $key => $value)
                            <tr>
                                <td>
                                    <div class="main__table-text">{{$value->comment_id }}</div>
                                </td>
                                <td>
                                    <div class="main__table-text"><a href="{{url('/seri-phim/'.$value->seri->seri_name_slug)}}">{{$value->seri->seri_name_slug}}</a></div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$value->customer_name}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{$value->comment_content}}</div>
                                </td>
                                <td>
                                    @if($value->comment_status==0)
                                      &nbsp;<input style="width:100px;background-color:rgb(11, 177, 75);border-radius:10px" type="button" data-comment_status="0" data-comment_id="{{$value->comment_id}}" id="{{$value->seri_id}}" class="comment_duyet_btn" value="Duyệt" >
                                    @else
                                      &nbsp;<input style="width:100px;background-color:rgb(143, 41, 129);border-radius:10px" type="button" data-comment_status="1" data-comment_id="{{$value->comment_id}}" id="{{$value->seri_id}}" class="comment_duyet_btn" value="Bỏ Duyệt" >
                                    @endif
                                  </td>
                                <td>
                                    <div class="main__table-text center">{{date_format (new DateTime($value->created_at), 'd-m-Y')}}</div>
                                </td>
                                <td>
                                    <div class="main__table-btns">
                                        <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                            <i class="icon ion-ios-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end comments -->

            <!-- paginator -->
            <div class="col-12">
                <div class="paginator-wrap">
                    <span>10 from 21 356</span>

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                        </li>
                        <li class="paginator__item"><a href="#">1</a></li>
                        <li class="paginator__item paginator__item--active"><a href="#">2</a></li>
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

<!-- modal view -->
{{-- <div id="modal-view" class="zoom-anim-dialog mfp-hide modal modal--view">
    <div class="comments__autor">
        <img class="comments__avatar" src="{{asset('public/backend/img/user.svg')}}" alt="">
        <span class="comments__name">John Doe</span>
        <span class="comments__time">30.08.2018, 17:53</span>
    </div>
    <p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
    <div class="comments__actions">
        <div class="comments__rate">
            <span><i class="icon ion-md-thumbs-up"></i>12</span>

            <span>7<i class="icon ion-md-thumbs-down"></i></span>
        </div>
    </div>
</div> --}}
<!-- end modal view -->

@endsection
