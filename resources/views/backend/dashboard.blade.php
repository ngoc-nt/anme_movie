@extends('admin_layout')
@section('admin_content')
<main class="main">
    <div class="container-fluid">
        <div class="row row--grid">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Dashboard</h2>

                    <a href="{{URL::to('/add-movie')}}" class="main__title-link">Thêm tập phim</a>
                </div>
            </div>
            <!-- end main title -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats">
                    <span>Unique views this month</span>
                    <p>5 678</p>
                    <i class="icon ion-ios-stats"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats">
                    <span>Items added this month</span>
                    <p>172</p>
                    <i class="icon ion-ios-film"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats">
                    <span>New comments</span>
                    <p>2 573</p>
                    <i class="icon ion-ios-chatbubbles"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats">
                    <span>New reviews</span>
                    <p>1 021</p>
                    <i class="icon ion-ios-star-half"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- dashbox -->
            <div class="col-12 col-xl-6">
                <div class="dashbox">
                    <div class="dashbox__title">
                        <h3><i class="icon ion-ios-trophy"></i> Top items</h3>

                        <div class="dashbox__wrap">
                            <a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
                            <a class="dashbox__more" href="catalog.html">View All</a>
                        </div>
                    </div>

                    <div class="dashbox__table-wrap">
                        <table class="main__table main__table--dash">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TITLE</th>
                                    <th>CATEGORY</th>
                                    <th>RATING</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="main__table-text">321</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Movie</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.2</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">54</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Benched</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Movie</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.1</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">670</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Whitney</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">TV Show</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.0</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">241</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Blindspotting 2</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">TV Show</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 8.9</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">22</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Blindspotting</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">TV Show</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 8.9</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end dashbox -->

            <!-- dashbox -->
            <div class="col-12 col-xl-6">
                <div class="dashbox">
                    <div class="dashbox__title">
                        <h3><i class="icon ion-ios-film"></i> Latest items</h3>

                        <div class="dashbox__wrap">
                            <a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
                            <a class="dashbox__more" href="catalog.html">View All</a>
                        </div>
                    </div>

                    <div class="dashbox__table-wrap">
                        <table class="main__table main__table--dash">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TITLE</th>
                                    <th>CATEGORY</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="main__table-text">26</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Movie</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">Visible</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">25</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Benched</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Movie</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">Visible</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">24</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Whitney</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">TV Show</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">Visible</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">23</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Blindspotting 2</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">TV Show</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">Visible</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">22</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Blindspotting</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">TV Show</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">Visible</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end dashbox -->

            <!-- dashbox -->
            <div class="col-12 col-xl-6">
                <div class="dashbox">
                    <div class="dashbox__title">
                        <h3><i class="icon ion-ios-contacts"></i> Latest users</h3>

                        <div class="dashbox__wrap">
                            <a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
                            <a class="dashbox__more" href="users.html">View All</a>
                        </div>
                    </div>

                    <div class="dashbox__table-wrap">
                        <table class="main__table main__table--dash">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FULL NAME</th>
                                    <th>EMAIL</th>
                                    <th>USERNAME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="main__table-text">23</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Brian Cranston</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--grey">bcxwz@email.com</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">BrianXWZ</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">22</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Jesse Plemons</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--grey">jess@email.com</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Jesse.P</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">21</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Matt Jones</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--grey">matt@email.com</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Matty</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">20</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Tess Harper</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--grey">harper@email.com</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Harper123</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">19</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Jonathan Banks</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--grey">bank@email.com</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Jonathan</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end dashbox -->

            <!-- dashbox -->
            <div class="col-12 col-xl-6">
                <div class="dashbox">
                    <div class="dashbox__title">
                        <h3><i class="icon ion-ios-star-half"></i> Latest reviews</h3>

                        <div class="dashbox__wrap">
                            <a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
                            <a class="dashbox__more" href="reviews.html">View All</a>
                        </div>
                    </div>

                    <div class="dashbox__table-wrap">
                        <table class="main__table main__table--dash">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ITEM</th>
                                    <th>AUTHOR</th>
                                    <th>RATING</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="main__table-text">51</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Jonathan Banks</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.2</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">50</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Benched</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Charles Baker</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 6.3</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">49</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Whitney</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Matt Jones</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 8.4</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">48</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">Blindspotting</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Jesse Plemons</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.0</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="main__table-text">47</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                    </td>
                                    <td>
                                        <div class="main__table-text">Brian Cranston</div>
                                    </td>
                                    <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.7</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end dashbox -->
        </div>
    </div>
</main>
@endsection
