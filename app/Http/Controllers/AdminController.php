<?php

namespace App\Http\Controllers;

use App\Models\Social; //sử dụng model Social
use App\Models\Login; //sử dụng model Login
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Validator;
use Socialite;      //sử dụng Socialite
use DB;
use Session;
use Auth;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Video;
use App\Models\Customer;
use App\Models\Post;
use App\Models\Statistic;
use App\Models\Visitors;
use App\Models\Order;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function login_admin(){
        return view('backend.admin.login');
    }
    public function index(){
        return view('admin_layout');
    }
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }

    public function show_dashboard(Request $request){
        $this->AuthLogin();
            //get ip address
        $user_ip_address = $request->ip();

        return view('backend.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return view('backend.dashboard');
        }else
        {
            Session::put('message','Tai khoan hoac mat khẩu bi sai, vui lòng kiểm tra lai');
            return Redirect::to('/login');
        }
    }
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $ngoc = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',

                ]);
            }
            $ngoc->login()->associate($orang);
            $ngoc->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }
    }
    public function customer_register(Request $request){

        $data = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'customer_address' => 'required',
            'customer_phone' => 'required',
           'g-recaptcha-response' => new Captcha(), 		//dòng kiểm tra Captcha
        ]);

        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];

        $customer->customer_email = $data['customer_email'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->customer_address = $data['customer_address'];
        $customer->customer_password = md5($data['customer_password']);
        $customer->customer_date = now();
        $customer->save();

        return redirect('/dang-nhap')->with('message', 'Đăng ký tài khoản thành công,làm ơn đăng nhập');
    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
            $users = Socialite::driver('google')->stateless()->user();
            // return $users->id;
            $authUser = $this->findOrCreateUser($users,'google');
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');


        }
        public function findOrCreateUser($users,$provider){
            $authUser = Social::where('provider_user_id', $users->id)->first();
            if($authUser){

                return $authUser;
            }

            $ngoc = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);

            $orang = Login::where('admin_email',$users->email)->first();

                if(!$orang){
                    $orang = Login::create([
                        'admin_name' => $users->name,
                        'admin_email' => $users->email,
                        'admin_password' => '',
                        'admin_phone' => '',
                        'admin_status' => 1
                    ]);
                }
            $ngoc->login()->associate($orang);
            $ngoc->save();

            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }
        //
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
}
