<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Toastr;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\SeriMovie;
use App\Models\Movie;
session_start();

class MovieController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_movie(){
        $this->AuthLogin();
        $seri_movie = DB::table('tbl_seri_movie')->orderby('seri_id','asc')->get();
        return view('backend.movie.add_movie')->with(compact('seri_movie'));
    }
    public function save_movie(Request $request){
    	$data = $request->all();
    	$movie = new Movie();
    	$movie->movie_name = $data['movie_name'];
        $movie->movie_slug = Str::slug($data['movie_name']);
        $movie->seri_id  = $data['seri_id'];
    	$movie->movie_desc = $data['movie_desc'];
    	$movie->movie_url = $data['movie_url'];
        $movie->movie_status = '1';
        $movie->created_at = now();

        $get_image = $request->file('form__img-upload');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/movie',$new_image);

            $movie->movie_image = $new_image;

           	$movie->save();
            Toastr::success('Thêm tập phim thành công', 'Thông báo');
            return redirect()->back();
        }else{
        	Toastr::error('Có lỗi khi thêm tập phim', 'Cảnh báo');
            return redirect()->back();
        }
    }
    public function all_movie(){
        $this->AuthLogin();
        $all_movie = DB::table('tbl_movie')
        ->join('tbl_seri_movie','tbl_seri_movie.seri_id','=','tbl_movie.seri_id')
        ->orderby('tbl_movie.movie_id','asc')->get();

        return view('backend.movie.all_movie')->with(compact('all_movie'));
    }
    public function edit_movie($seri_id){
        $this->AuthLogin();
        $cate_seri = DB::table('tbl_category_movie')->orderby('category_id','desc')->get();
        $genre_seri = DB::table('tbl_genre_movie')->orderby('genre_id','desc')->get();
        $edit_seri_movie = DB::table('tbl_seri_movie')->where('seri_id',$seri_id)->get();
        $manager_movie = view('backend.movie.edit_movie')->with('edit_seri_movie',$edit_seri_movie)->with('cate_seri',$cate_seri)->with('genre_seri',$genre_seri);
        return view('admin_layout')->with('backend.seri_movie.edit_movie', $manager_movie);
    }
    public function delete_movie($movie_id){
        $this->AuthLogin();
        DB::table('tbl_movie')->where('movie_id',$movie_id)->delete();
        // $seri = SeriMovie::find($seri_id);
        // $seri_image = $seri->seri_image;
        // if($seri_image){
        // 	$path ='public/uploads/seri/'.$post_image;
        // 	unlink($path);
        // }
        // $seri->delete();
        Toastr::success('Xóa tập phim thành công', 'Thông báo');
        return redirect()->back();
    }
    public function unactive_movie($movie_id){
        $this->AuthLogin();
        DB::table('tbl_movie')->where('movie_id',$seri_id)->update(['movie_status'=>0]);
        Toastr::success('Ẩn bộ phim thành công', 'Thông báo');
        return redirect()->back();
    }
    public function active_movie($seri_id){
        $this->AuthLogin();
        DB::table('tbl_movie')->where('movie_id',$seri_id)->update(['movie_status'=>0]);
        Toastr::success('Kích hoạt trạng thái bộ phim thành công', 'Thông báo');
        return redirect()->back();
    }
}
