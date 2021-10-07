@extends('admin_layout')
@section('admin_content')

<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Thêm tập phim</h2>
                </div>
            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form action="{{URL::to('/save-movie')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row row--form">
                        <div class="col-12 col-md-5 form__cover">
                            <div class="row row--form">
                                <div class="col-12 col-sm-6 col-md-12">
                                    <div class="form__img">
                                        <label for="form__img-upload">Upload cover (270 x 400)</label>
                                        <input id="form__img-upload" name="form__img-upload" type="file" accept=".png, .jpg, .jpeg">
                                        <img id="form__img" src="#" alt=" ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 form__content">
                            <div class="row row--form">
                                <div class="col-12">
                                    <input type="text" name="movie_name" class="form__input" placeholder="Title">
                                </div>

                                <div class="col-12">
                                    <textarea id="text" name="movie_desc" class="form__textarea" placeholder="Mô tả"></textarea>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">

                                    <p style="color: rgb(211, 126, 15); font-size:20px;padding: 10px 0;">Thuộc seri phim: </p>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-9">
                                    <select name="seri_id" class="js-example-basic-single" id="quality">
                                        @foreach($seri_movie as $key => $seri)
                                        <option value="{{$seri->seri_id}}">{{$seri->seri_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <input type="text" name="movie_url" class="form__input" placeholder="Thêm link phim">
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-sm-12">
                            <button type="submit" class="form__btn">Đăng tập phim</button>
                        </div>

                    </div>
                </form>
            </div>
            <!-- end form -->
        </div>
    </div>
</main>

@endsection
