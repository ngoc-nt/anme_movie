<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Toastr;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        $admin = Admin::with('roles')->orderBy('admin_id','ASC')->get();
        return view('backend.user.all_user')->with(compact('admin'));
    }
    public function impersonate($admin_id){
        $user = Admin::where('admin_id',$admin_id)->first();
        if($user){
            session()->put('impersonate',$user->admin_id);
        }
        return redirect('/all-users');
    }
    public function impersonate_destroy(){
        session()->forget('impersonate');
        return redirect('/users');
    }
    public function add_users(){
        return view('admin.users.add_users');
    }
    public function delete_user_roles($admin_id){
        if(Auth::id()==$admin_id){
            return redirect()->back()->with('message','Bạn không được quyền xóa chính mình');
        }
        $admin = Admin::find($admin_id);

        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message','Xóa user thành công');

    }
    public function assign_roles(Request $request){

        if(Auth::id()==$request->admin_id){
            return redirect()->back()->with('message','Bạn không được phân quyền chính mình');
        }

        $user = Admin::where('admin_email',$request->admin_email)->first();
        $user->roles()->detach();

        if($request->author_role){
           $user->roles()->attach(Roles::where('name','author')->first());
        }
        if($request->user_role){
           $user->roles()->attach(Roles::where('name','user')->first());
        }
        if($request->admin_role){
           $user->roles()->attach(Roles::where('name','admin')->first());
        }
        return redirect()->back()->with('message','Cấp quyền thành công');
    }

    public function store_users(Request $request){
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->attach(Roles::where('name','user')->first());
        $admin->save();
        Session::put('message','Thêm users thành công');
        return Redirect::to('users');
    }
    public function reset_password(){
        return view('backend.user.forgot_pass');
    }
}
