<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::get('/404','HomeController@error_page');
//
Route::get('/dang-nhap','HomeController@login_customer');
//
Route::get('/danh-muc/{category_slug}','HomeController@show_category');
Route::get('/the-loai/{genre_slug}','HomeController@show_genre');
//
Route::get('/seri-phim/{seri_name_slug}', 'SeriMovieController@show_details_seri');
Route::get('/xem-phim/{seri_name_slug}', 'SeriMovieController@show_movie');
Route::get('/xem-tap-phim/{movie_slug}', 'SeriMovieController@watch_movie');

//login User trang Home
Route::get('/dang-nhap','AuthController@dang_nhap_user');
Route::post('/login-user','AuthController@login_user');
Route::get('/dang-ky','AuthController@dang_ky');
Route::post('/register-user','AuthController@register_user');
Route::get('/dang-xuat','AuthController@logout_user');

//Comment
Route::post('/load-comment','HomeController@load_comment');
Route::post('/send-comment','HomeController@send_comment');
Route::get('/all-comment','CommentController@index');
Route::post('/allow-comment','CommentController@allow_comment');
Route::post('/reply-comment','CommentController@reply_comment');


//---------------------------------------------------------------------
//Trang Admin
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
//
Route::get('/login','AuthController@login');
Route::post('/login-admin','AuthController@login_admin');
Route::get('/register','AuthController@register');
Route::post('/register-admin','AuthController@register_admin');
Route::get('/logout','AuthController@logout');

//User-Admin
Route::get('/add-admin', 'UserController@add_movie');
Route::get('/all-users','UserController@index');
Route::post('/save-movie', 'UserController@save_movie');
Route::get('/delete-movie/{admin_id}', 'UserController@delete_movie');
Route::get('/all-us', 'UserController@all_movie');
Route::get('/active-admin/{movie_id}', 'UserController@edit_movie');
Route::get('/unactive-admin/{admin_id}', 'UserController@edit_movie');
Route::get('/edit-movie/{admin_id}', 'UserController@edit_movie');
Route::post('/update-movie/{admin_id}', 'UserController@update_movie');


//Dang nhap fb-gmail
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback-fb','AdminController@callback_facebook');
Route::get('/login-google','AdminController@login_google');
Route::get('/admin/callback-gg','AdminController@callback_google');


//Seri-Film (1 bộ phim gồm nhiều 1 tập phim)
Route::get('/add-seri-movie', 'SeriMovieController@add_seri_movie');
Route::post('/save-seri-movie', 'SeriMovieController@save_seri_movie');
Route::get('/delete-seri-movie/{seri_id}', 'SeriMovieController@delete_seri_movie');
Route::get('/all-seri-movie', 'SeriMovieController@all_seri_movie');
Route::get('/edit-seri-movie/{seri_id}', 'SeriMovieController@edit_seri_movie');
Route::get('/unactive-seri-movie/{seri_id}', 'SeriMovieController@unactive_seri_movie');
Route::get('/active-seri-movie/{seri_id}', 'SeriMovieController@active_seri_movie');
Route::post('/update-seri-movie/{seri_id}', 'SeriMovieController@update_seri_movie');

//Film (1 tập phim chỉ thuộc 1 bộ phim)
Route::get('/add-movie', 'MovieController@add_movie');
Route::post('/save-movie', 'MovieController@save_movie');
Route::get('/delete-movie/{movie_id}', 'MovieController@delete_movie');
Route::get('/all-movie', 'MovieController@all_movie');
Route::get('/edit-movie/{movie_id}', 'MovieController@edit_movie');
Route::post('/update-movie/{movie_id}', 'MovieController@update_movie');

//banner
Route::get('/add-banner', 'HomeController@add_banner');
Route::get('/edit-banner', 'HomeController@add_banner');
Route::get('/unactive-banner/{banner_id}', 'HomeController@unactive-banner');
Route::get('/active-banner/{banner_id}', 'HomeController@active-banner');
Route::post('/save-banner', 'HomeController@save_banner');

//
// Route::get('/register-auth','AuthController@register_auth');
// Route::get('/login-auth','AuthController@login_auth');
// Route::post('/register','AuthController@register');
// Route::post('/login','AuthController@login');
// Route::get('/logout-auth','AuthController@logout_auth');

// Route::group(['middleware' => 'auth.roles'], function () {
// 	Route::get('/add-product','ProductController@add_product');
// 	Route::get('/edit-product/{product_id}','ProductController@edit_product');
// });
Route::get('all-users','UserController@index');
Route::get('    ','UserController@reset_password');
// Route::get('users','UserController@index')->middleware('auth.roles');
// Route::get('add-users','UserController@add_users')->middleware('auth.roles');
// Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');
// Route::post('store-users','UserController@store_users')->middleware('auth.roles');
// Route::post('assign-roles','UserController@assign_roles');

// Route::get('impersonate/{admin_id}','UserController@impersonate');
// Route::get('impersonate-destroy','UserController@impersonate_destroy');




