<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Banner;
use App\Models\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\CustomerAddRequest as CusAddReq;
use App\Http\Requests\Customer\CustomerLoginRequest as CusLogReq;
use App\Http\Requests\Customer\CustomerUpdateInfoRequest as CusUpInfoReq;
use App\Http\Requests\Customer\CustomerUpdatePassRequest as CusUpPassReq;
use App\Http\Requests\Customer\CustomerForgotRequest as CusForgotReq;
use App\Http\Requests\Customer\CustomerResetRequest as CusResetReq;
use App\Http\Requests\Customer\CustomerNewPassRequest as CusNewPassReq;
use Auth;
use Hash;
use Str;
use Mail;
use App\Cart;
use Session;

class CustomerController extends Controller
{
    public function login() {
    	return view('frontend.login');
    }
    //đăng nhập tài khoản người dùng
    public function post_login(CusLogReq $request) {
    	$login = Auth::guard('cus')->attempt($request->only('email','password'),$request->has('remember'));
    	if ($login) {
    		return redirect()->route('index')->with('success','Logged in successfully !');
    	}
    		return redirect()->back()->with('error','Login Failed Successfully !');
	}
	public function index() {
        $banner  = Banner::all();
    	return view('frontend.index',compact('homes'));
    }
	
    public function profile() {
    	// dd("sadsa");
    	return view('frontend.profile');
	}

	public function updateInfo(Customer $customers) {
		return view('frontend.updateInfo');
	}
	public function post_updateInfo(CusUpInfoReq $request,$id) {
		$customers=Customer::find($id);
		$update = $customers->update($request->all());
		if ($update) {
			return redirect()->route('customer.profile')->with('success','Successful Update !');
		} else {
			return redirect()->route('customer.profile')->with('success','Update Information Failed !');
		}
	}
	public function updatePass(Customer $customers) {
		return view('frontend.updatePass');
	}
	public function post_updatePass(CusUpPassReq $request,$id) {
		
		$request_data = $request->all();
		$current_password = Auth::guard('cus')->user()->password;
		
		if (Hash::check($request_data['current-password'], $current_password)) {
    		$user_id = Auth::guard('cus')->user()->id;                       
			$obj_user = Customer::find($user_id);
			$obj_user->password = Hash::make($request_data['password']);
			$obj_user->save(); 
		}
		
		return redirect()->route('customer.profile')->with('success','Password Successful Update !');
	}

    public function order() {
    	return view('frontend.order');
    }

    public function register() {
    	return view('frontend.register');
    }
    //thêm mới tài khoản người dùng
    public function post_register(CusAddReq $request) {

    	$request->merge(['password' => bcrypt($request->password)]);

    	$reg = Customer::create($request->all());

    	if ($reg) {
    		return redirect()->route('customer.login')->with('success','Register Success!');
    	}
    		return redirect()->back()->with('error','Registration failed !');
    	
    	
    }

    public function logout() {
		Auth::guard('cus')->logout();
    	
    	return redirect()->route('customer.login')->with('success','  Login Out Successful !');
	}

	public function forgotpassword() {
		return view('frontend.forgotpassword');
	}
	public function resetpassword() {
		return view('frontend.resetpassword');
	}
	public function NewPassword() {
		return view('frontend.newpassword');
	}
	//ddặt lại mật khẩu
	public function getNewPassword(CusNewPassReq $request,ResetPassword $resetPassword) {
		$model = $resetPassword->new_password();
		if ($model == 1) {
			return redirect()->route('customer.login')->with('success','Password Successful Reset !');
		}else {
			return redirect()->back()->with('error','Password Reset failed !');
		}
	}
}

