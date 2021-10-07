@extends('admin_layout')
@section('admin_content')

<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Thêm banner quảng cáo</h2>
                </div>
            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form action="{{URL::to('/save-banner')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row row--form">
                        <div class="col-12 col-md-5 form__cover">
                            <div class="row row--form">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="form__img">
                                        <label for="form__img-upload">Upload ảnh ( kích thước 270 x 400)</label>
                                        <input id="form__img-upload" name="form__img-upload" type="file" accept=".png, .jpg, .jpeg">
                                        <img id="form__img" src="#" alt=" ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 form__content">
                            <div class="row row--form">
                                <div class="col-12">
                                    <input type="text" name="banner_name" class="form__input" placeholder="Tiêu đề banner">
                                </div>

                                <div class="col-12">
                                    <textarea id="text" name="banner_url" class="form__textarea" placeholder="Link quảng cáo banner"></textarea>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <select class="js-example-basic-multiple" id="banner" name="banner_status" multiple="multiple">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ân</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row row--form">
                                <div class="col-12">
                                    <button type="submit" class="form__btn">Upload banner</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end form -->
        </div>
    </div>
</main>

@endsection
