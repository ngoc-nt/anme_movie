<?php

namespace App\Http\Controllers;

use Toastr;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customers;
use App\Models\Roles;
use Auth;
use App\Models\CategoryMovie;
use App\Models\GenreMovie;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class AuthController extends Controller
{
    public function register(){
        return view('backend.admin.resgister');
    }
    public function login(){
        return view('backend.admin.login');
    }
    public function register_admin(Request $request){
		$this->validation($request);
		$data = $request->all();
        // dd($data);
		$admin = new Admin();
		$admin->admin_name = $data['admin_name'];
		$admin->admin_phone = $data['admin_phone'];
		$admin->admin_email = $data['admin_email'];
		$admin->admin_password = md5($data['admin_password']);
        $admin->admin_status = '0';
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $admin->created_at = $order_date;
		$admin->save();
        Toastr::info('Đăng ký tài khoản thành công, vui lòng chờ admin xác nhận', 'Thông báo');
        return redirect()->back();

    }
    public function login_admin(Request $request){
        $this->validate($request,[
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255'
        ]);
        $data = $request->all();
        if(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password,'admin_status'=>'1' ])){
            Toastr::success('Bạn đã đăng nhập thành công', 'Thông báo');
            return redirect('/dashboard');
        }
        else{
            Toastr::warning('Tài khoản hoặc mật khẩu không đúng', 'Cảnh báo');
            return redirect('/login');
        }

    }
    public function logout(){
        Auth::logout();
        Toastr::success('Bạn đã đăng xuất thành công', 'Thông báo');
        return redirect('/login');
    }
    public function validation($request){
    	return $this->validate($request,[
    		'admin_name' => 'required|max:255',
    		'admin_phone' => 'required|max:255',
    		'admin_email' => 'required|email|max:255',
    		'admin_password' => 'required|max:255',
    	]);
    }
    //-----------------------------------------------
    public function dang_ky(){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        return view('frontend.user.register')->with(compact('category'))->with(compact('genre'));
    }
    public function dang_nhap_user(){
        $category = CategoryMovie::orderBy('category_id','DESC')->where('category_status','1')->take(5)->get();
        $genre = GenreMovie::orderBy('genre_id','DESC')->where('genre_status','1')->take(5)->get();
        return view('frontend.user.login')->with(compact('category'))->with(compact('genre'));
    }
    public function register_user(Request $request){
		// $this->validation($request);
		// $data = $request->all();
        $data = $request -> validate(
        [
            'customer_email' => 'required|email|unique:tbl_customers',
            'customer_name' => 'required|max:255',
            'customer_phone' => 'required|numeric|size:11',
            'customer_pass' => 'required|min:6',
        ],
        [
            'customer_email.required' => 'Bạn chưa nhâp email',
            'customer_email.unique' => 'Email bạn nhập đã được đăng ký, thử email khác.',
            'customer_name.required' => 'Bạn chưa nhập tên của bạn.',
            'customer_phone.required' => 'Bạn chưa nhập số điện thoại của bạn.',
            'customer_phone.numeric' => 'SĐT bạn nhập có chữ, vui lòng thử lại',
            'customer_phone.size' => 'SĐT bạn nhập nhiều hơn 10 ký tự, thử lại',
            'customer_pass.required' => 'Bạn chưa nhập mật khẩu của bạn.',
            'customer_pass.min' => 'Mật khẩu tối thiểu 6 ký tự.',
        ]);
        // dd($data);
		$customer = new Customers();
		$customer->customer_name = $data['customer_name'];
		$customer->customer_phone = $data['customer_phone'];
		$customer->customer_email = $data['customer_email'];
		$customer->customer_password = md5($data['customer_pass']);
        $customer->customer_status = '0';
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $customer->created_at = $order_date;
		$customer->save();
        Toastr::info('Đăng ký tài khoản thành công, vui lòng chờ admin xác nhận', 'Thông báo');
        return redirect()->back();

    }
    public function login_user(Request $request){
        $this->validate($request,
        [
            'user_email' => 'required|email|max:120',
            'user_pass' => 'required|max:255'
        ],
        [
            'user_email.required' => 'Bạn chưa nhâp email',
            'user_email.email' => 'Bạn chưa nhâp đúng định dạng email',
            'user_pass.required' => 'Bạn chưa nhập mật khẩu của bạn.',

        ]);
        $email = $request->user_email;
        $password = md5($request->user_pass);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            Toastr::info('Bạn đã đăng nhập thành công!', 'Thông báo');
            return Redirect::to('/');
            // Toastr::info('Bạn đã đăng nhập thành công!', 'Thông báo');
        }else{
            return redirect()->back()->with('message','Tài khoản bạn nhập không tồn tại hoặc sai, vui lòng kiểm tra lại!');
        }
        Session::save();
    }
    public function logout_user(){
        Session::forget('customer_id');
        Session::forget('customer_name');
        return Redirect::to('/dang-nhap');
        Toastr::success('Bạn đã đăng xuất thành công', 'Thông báo');
    }
}
