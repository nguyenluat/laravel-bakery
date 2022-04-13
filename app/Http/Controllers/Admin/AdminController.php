<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Hash;
use Session;
use Auth;
use DB;
// use Illuminate\Contracts\Session\Session;

class AdminController extends Controller
{
    public function index()
	{
		$admin=DB::table('admins')->get();
	   return view('admin.index',compact('admin'));
	}
	public function loginGet(){
		if(!Auth::guard('admin')->check()){
            return view('admin.login');
        }
        return view('admin.index');
	}
	public function loginPost(Request $request)
	{
		if($request->isMethod('post')){
			$data = $request->all();

			$rules = [
				'email' => 'required|email|max:255',
				'password' => 'required',
			];

			$CustomerMessages = [
				'email.required' => 'Email is required',
				'email.email' => 'Valid Email is required',
				'password.required' => 'Password is required',
			];

			$this->validate($request,$rules,$CustomerMessages);





			if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
				return redirect('admin/index');
			}else{
				Session::flash('error_message','Invalid Email of  Password');
				return redirect()->back();
			}
		}
	   return view('admin.login');
	}
	public function logout(){
		Session::flush();
        return redirect('/')->with('flash_message_success','loged out Successfully!');
	
	}
}
