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

use App\Models\Movie;
session_start();

class SeriMovieController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_seri_movie(){
        $this->AuthLogin();
        $category_seri = DB::table('tbl_category_movie')->orderby('category_id','desc')->get();
        $genre_seri = DB::table('tbl_genre_movie')->orderby('genre_id','desc')->get();
        return view('backend.seri_movie.add_movie')->with('category_seri', $category_seri)->with('genre_seri', $genre_seri);
    }
    public function save_seri_movie(Request $request){
    	$data = $request->all();
    	$seri_movie = new SeriMovie();

    	$seri_movie->seri_name = $data['seri_name'];
    	$seri_movie->seri_name_slug = Str::slug($data['seri_name']);
        $seri_movie->seri_desc = $data['seri_desc'];
    	$seri_movie->seri_year = $data['seri_year'];
    	$seri_movie->seri_duration = $data['seri_duration'];
    	$seri_movie->seri_quality = $data['seri_quality'];
    	$seri_movie->seri_old = $data['seri_old'];
    	$seri_movie->seri_country = $data['seri_country'];
    	$seri_movie->seri_number = $data['seri_number'];
        $seri_movie->category_id = $data['movie_category'];
        $seri_movie->genre_id = $data['seri_genre'];
        $seri_movie->seri_status = '1';

        $get_image = $request->file('form__img-upload');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/seri',$new_image);

            $seri_movie->seri_image	 = $new_image;

           	$seri_movie->save();
            Toastr::success('Thêm bộ phim thành công', 'Thông báo');
            return redirect()->back();
        }else{
        	Toastr::error('Có lỗi khi thêm bộ phim', 'Cảnh báo');
            return redirect()->back();
        }
    }
    public function all_seri_movie(){
        $this->AuthLogin();
        // $all_seri = SeriMovie::orderBy('seri_id','DESC')->get();
        $all_seri = DB::table('tbl_seri_movie')
        ->join('tbl_category_movie','tbl_category_movie.category_id','=','tbl_seri_movie.category_id')
        ->join('tbl_genre_movie','tbl_genre_movie.genre_id','=','tbl_seri_movie.genre_id')
        ->orderby('tbl_seri_movie.seri_id','asc')->get();

        return view('backend.seri_movie.all_movie')->with(compact('all_seri'));
    }
    public function edit_seri_movie($seri_id){
        $this->AuthLogin();
        $cate_seri = DB::table('tbl_category_movie')->orderby('category_id','desc')->get();
        $genre_seri = DB::table('tbl_genre_movie')->orderby('genre_id','desc')->get();
        $edit_seri_movie = DB::table('tbl_seri_movie')->where('seri_id',$seri_id)->get();
        $manager_movie = view('backend.movie.edit_movie')->with('edit_seri_movie',$edit_seri_movie)->with('cate_seri',$cate_seri)->with('genre_seri',$genre_seri);
        return view('admin_layout')->with('backend.seri_movie.edit_movie', $manager_movie);
    }
    public function delete_seri_movie($seri_id){
        $this->AuthLogin();
        DB::table('tbl_seri_movie')->where('seri_id',$seri_id)->delete();
        // $seri = SeriMovie::find($seri_id);
        // $seri_image = $seri->seri_image;
        // if($seri_image){
        // 	$path ='public/uploads/seri/'.$post_image;
        // 	unlink($path);
        // }
        // $seri->delete();
        Toastr::success('Xóa bộ phim thành công', 'Thông báo');
        return redirect()->back();
    }
    public function unactive_seri_movie($seri_id){
        $this->AuthLogin();
        DB::table('tbl_seri_movie')->where('seri_id',$seri_id)->update(['seri_status'=>0]);
        Toastr::success('Ẩn bộ phim thành công', 'Thông báo');
        return redirect()->back();
    }
    public function active_seri_movie($seri_id){
        $this->AuthLogin();
        DB::table('tbl_seri_movie')->where('seri_id',$seri_id)->update(['seri_status'=>1]);
        Toastr::success('Kích hoạt trạng thái bộ phim thành công', 'Thông báo');
        return redirect()->back();
    }
    public function show_details_seri(Request $request, $seri_name_slug)
    {
        $url_canonical = $request->url();
        $seriMovie = SeriMovie::with('movies')
            ->where('seri_name_slug', $seri_name_slug)
            ->first();
            // dd($seriMovie);
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
       $details_seri = DB::table('tbl_seri_movie')
       ->join('tbl_category_movie','tbl_category_movie.category_id','=','tbl_seri_movie.category_id')
       ->join('tbl_genre_movie','tbl_genre_movie.genre_id','=','tbl_seri_movie.genre_id')
       ->where('tbl_seri_movie.seri_name_slug',$seri_name_slug)->get();
    //    $se

       return view ('frontend.seri_movie.details_seri')->with(compact('url_canonical'))->with(compact('category'))->with(compact('genre'))->with(compact('details_seri', 'seriMovie'));
    }
    public function show_movie(Request $request,$seri_name_slug){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        $seri_name_slug = SeriMovie::where('seri_name_slug',$seri_name_slug)->get();
        foreach($seri_name_slug as $key => $cate){
            $seri_id = $cate->seri_id;
        }
        // $name_movie = Movie::with('movies')
        // ->where('seri_id', $seri_id)
        // ->first();


        $detail_movie = DB::table('tbl_seri_movie')
        ->join('tbl_movie','tbl_movie.seri_id','=','tbl_seri_movie.seri_id')
        ->where('tbl_movie.seri_id',$seri_id)->get();


        $movie_by_id = Movie::with('seri_movie')->where('seri_id',$seri_id)->paginate();
        // dd($movie_by_id);
        $movie = SeriMovie::find($seri_id);
        $movie->seri_views = $movie->seri_views + 1;
        $movie->save();
        // dd($movie);

        return view('frontend.seri_movie.details_movie')->with(compact('movie_by_id'))->with(compact('detail_movie'))->with(compact('category'))->with(compact('genre'));
    }
    public function watch_movie(Request $request,$movie_slug){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        $movie = Movie::where('movie_slug',$movie_slug)->get();
        return view('frontend.seri_movie.watch_movie')->with(compact('movie'))->with(compact('category'))->with(compact('genre'));
    }

}
