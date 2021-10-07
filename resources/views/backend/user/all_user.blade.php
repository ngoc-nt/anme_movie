@extends('admin_layout')
@section('admin_content')
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Users</h2>

                    <span class="main__title-stat">{{count($admin)}} tài khoản</span>

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
                                <li>Pricing plan</li>
                                <li>Status</li>
                            </ul>
                        </div>
                        <!-- end filter sort -->

                        <!-- search -->
                        <form action="#" class="main__title-form">
                            <input type="text" placeholder="Find user..">
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
                                <th>Thông tin tài khoản</th>
                                <th>Tên user</th>
                                <th>Quyền</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái </th>
                                <th>Thời gian tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        @foreach($admin as $key => $user)
                        <form action="{{url('/assign-roles')}}" method="POST">
                            @csrf
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="main__table-text">{{$user->admin_id}}</div>
                                    </td>
                                    <td>
                                        <div class="main__user">
                                            <div class="main__avatar">
                                                <img src="{{asset('public/backend/img/user.svg')}}" alt="">
                                            </div>
                                            <div class="main__meta">
                                                <h3>{{$user->admin_name}}</h3>
                                                <span>{{$user->admin_email}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">{{$user->admin_name}}</div>
                                    </td>

                                    <?php
                                        if($user->hasRole('admin')){
                                        ?>
                                       <td>
                                            <div class="main__table-text">Admin</div>
                                        </td>
                                        <?php
                                        }elseif($user->hasRole('moderator')){
                                        ?>
                                        <td>
                                            <div class="main__table-text">Moderator</div>
                                        </td>
                                        <?php
                                        }elseif($user->hasRole('user')){
                                        ?>
                                        <td>
                                            <div class="main__table-text">User</div>
                                        </td>
                                        <?php
                                        }
                                        ?>

                                    {{-- <td>
                                        <div class="main__table-text">Premium</div>
                                    </td> --}}
                                    {{-- <td>
                                        <input style="color: rgb(207, 21, 21);back-ground-color:white" type="checkbox" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="moderator_role" {{$user->hasRole('moderator') ? 'checked' : ''}}>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}>
                                    </td> --}}


                                    <td>
                                        <div class="main__table-text">{{$user->admin_phone}}</div>
                                    </td>
                                    <?php
                                        if($user->admin_status==0){
                                        ?>
                                        <td>
                                            <div class="main__table-text main__table-text--red">Bị khóa</div>
                                        </td>
                                        <?php
                                        }else{
                                        ?>
                                        <td>
                                            <div class="main__table-text main__table-text--green">Đang kích hoạt</div>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                    <td>
                                        <div class="main__table-text">{{$user->created_at}}</div>
                                    </td>
                                    <td>
                                        <div class="main__table-btns">
                                            <?php
                                            if($user->admin_status==0){
                                            ?>
                                            <a href="{{URL::to('/active-admin/'.$user->admin_id)}}" class="main__table-btn main__table-btn--banned">
                                                <i class="icon ion-ios-lock"></i>
                                            </a>
                                            <?php
                                            }else{
                                            ?>
                                            <a href="{{URL::to('/unactive-admin/'.$user->admin_id)}}" class="main__table-btn main__table-btn--banned">
                                                <i class="icon ion-ios-unlock"></i>
                                            </a>
                                            <?php
                                            }
                                            ?>

                                            <a href="{{URL::to('/edit-admin/'.$user->admin_id)}}" class="main__table-btn main__table-btn--edit">
                                                <i class="icon ion-ios-create"></i>
                                            </a>
                                            <a href="{{url('/delete-admin-roles/'.$user->admin_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bộ phim này?')" class="main__table-btn main__table-btn--delete">
                                                <i class="icon ion-ios-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- end users -->

            <!-- paginator -->
            <div class="col-12">
                <div class="paginator-wrap">
                    <span>10 from 3 702</span>

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
@endsection
