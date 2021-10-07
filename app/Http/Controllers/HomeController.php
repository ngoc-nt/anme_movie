<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Toastr;
use Session;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\SeriMovie;
use App\Models\CategoryMovie;
use App\Models\GenreMovie;
use App\Models\Banner;
use App\Models\Movie;
use App\Models\Comment;
session_start();
class HomeController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            Toastr::error('Bạn chưa đăng nhập tài khoản admin', 'Cảnh báo');
            return Redirect::to('login')->send();
        }
    }
    public function index(){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        $new_seri = DB::table('tbl_seri_movie')->where('seri_status',1)->join('tbl_category_movie','tbl_category_movie.category_id','=','tbl_seri_movie.category_id')
        ->join('tbl_genre_movie','tbl_genre_movie.genre_id','=','tbl_seri_movie.genre_id')
        ->orderby('seri_id', 'desc')->limit(6)->get();
        $banner = DB::table('tbl_banner')->where('banner_status','1')->orderby('banner_id','asc')->get();
        return view('frontend.home')->with(compact('new_seri'))->with(compact('banner'))->with(compact('category'))->with(compact('genre'));
    }
    public function add_banner(){
        $this->AuthLogin();
        return view('backend.banner.add_banner');
    }
    public function save_banner(Request $request){
        $data = $request->all();
        $slider = new Banner();
        $slider->banner_name = $data['banner_name'];
        $slider->banner_status = $data['banner_status'];
        $slider->banner_url = $data['banner_url'];
        $get_image = request('form__img-upload');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/banner', $new_image);
            $slider->banner_images = $new_image;
            $slider->save();
            Toastr::success('Thêm banner quảng cáo thành công', 'Thông báo');
            return redirect()->back();
        }else{
            Toastr::error('Có lỗi khi thêm banner', 'Cảnh báo');
            return redirect()->back();
        }
    }
    public function error_page(){
        return view('backend.404.404');
    }
    public function login_customer(Request $request){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        return view('frontend.user.login')->with(compact('category'))->with(compact('genre'));
    }
    public function search(Request $request){
        $keyword = $request->keywords;
        // dd($keyword);
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        $search_movie = DB::table('tbl_seri_movie')->where('seri_name','like','%'.$keyword.'%')
        ->join('tbl_category_movie','tbl_category_movie.category_id','=','tbl_seri_movie.category_id')
        ->join('tbl_genre_movie','tbl_genre_movie.genre_id','=','tbl_seri_movie.genre_id')->paginate(6);
        return view('frontend.folder.search_movie')->with(compact('category'))->with(compact('genre'))->with(compact('search_movie'));
    }
    public function show_category(Request $request,$category_slug){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        $category_by_slug = CategoryMovie::where('category_slug',$category_slug)->get();
        foreach($category_by_slug as $key => $cate){
            $category_id = $cate->category_id;
        }
        // $category_by_id = Movie::with('seri_movie')->where('category_id',$category_id)->paginate(6);
        $movie_by_id = SeriMovie::with('danhmuc')->where('category_id',$category_id)->orderBy('seri_id','desc')->where('seri_status','1')
        ->join('tbl_genre_movie','tbl_genre_movie.genre_id','=','tbl_seri_movie.genre_id')->paginate(6)->appends(request()->query());
        // $movie_by_id = CategoryMovie::with('cate_movies')->where('category_id',$category_id)->paginate();
        // var_dump($movie_by_id);
        return view('frontend.folder.category_movie')->with(compact('category'))->with(compact('genre'))->with(compact('movie_by_id'));
    }
    public function show_genre(Request $request,$genre_slug){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        $genre_slug = GenreMovie::where('genre_slug',$genre_slug)->get();
        foreach($genre_slug as $key => $gen){
            $genre_id = $gen->genre_id;
        }
        $movie_by_id = SeriMovie::with('theloai')->where('genre_id',$genre_id)->orderBy('seri_id','desc')->where('seri_status','1')
        ->join('tbl_category_movie','tbl_category_movie.category_id','=','tbl_seri_movie.category_id')
        ->paginate(6)->appends(request()->query());
        return view('frontend.folder.genre_movie')->with(compact('category'))->with(compact('genre'))->with(compact('movie_by_id'));
    }
    public function send_comment(Request $request){
        $seri_id = $request->seri_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment_content = $comment_content;
        $comment->customer_name = $comment_name;
        $comment->seri_id = $seri_id;
        $comment->created_at = now();
        $comment->comment_status = 0;
        $comment->comment_parent_comment = 0;
        $comment->save();
    }
    public function load_comment(Request $request){
        $seri_id = $request->seri_id;
        $comment = Comment::where('seri_id',$seri_id)->where('comment_parent_comment','=',0)->where('comment_status',1)->get();
        // $comment_rep = Comment::with('seri')->where('comment_parent_comment','>',0)->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output.= '

                                    <div class="anime__review__item">
                                        <div class="anime__review__item__pic">
                                            <img src="'.url('/public/frontend/img/user.jpg').'" alt="User">
                                        </div>
                                        <div class="anime__review__item__text">
                                            <h6>@'.$comm->customer_name.'<span style="float:right;">'.'Đăng lúc:  '.$comm->created_at.'</span></h6>
                                            <p>'.$comm->comment_content.'</p>
                                        </div>
                                    </div>

                                    ';

                                    // foreach($comment_rep as $key => $rep_comment)  {
                                    //     if($rep_comment->comment_parent_comment==$comm->comment_id)  {
                                    //  $output.= '
                                    //             <div class="anime__review__item children">
                                    //                 <div class="anime__review__item__pic">
                                    //                 <img src="'.url('/public/frontend/img/admin.jpg').'" alt="Admin">
                                    //                 </div>
                                    //                 <div class="anime__review__item__text">
                                    //                     <h6>@'.$comm->customer_name.'<span>'.$comm->created_at.'</span></h6>
                                    //                     <p>'.$comm->comment_content.'</p>
                                    //                 </div>
                                    //             </div>

                                    //         ';
                                    //     }
                                    // }
        }
        echo $output;
    }
}
