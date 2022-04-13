<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Cart;
use App\Models\Shipping;
use App\Models\Payment;
use Auth;
use App\Http\Requests\Checkout\CheckoutAddRequest as CheckAddReq;


class CheckoutController extends Controller
{
    /**
     *  Home Thanh Toán
     */
    public function index() {

        // dd(Auth::guard('cus')->check());
         $oldCart = Session('Cart') ? Session('Cart') : null;
        $cart = new Cart($oldCart);
        // dd($cart);



        if(Auth::guard('cus')->check()){
            $ships = Shipping::all();
            $payments = Payment::all();
            // dd("sadsa");
            return view('checkout.index',compact('ships','payments'));
        }
        else{
             return redirect()->route('customer.login');
        }
       
    }
    /**
     * Lưu Thông Tin Đơn Hàng
     */
    public function post_index(CheckAddReq $request,Order $order) {
        // dd("sadsa");
        // dd($request);
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $cart = new Cart($oldCart);
        // dd($cart->totalPrice);
        if ($cart->totalQuanty == 0) {
            return redirect()->back()->with('error','Order Failed !');
        }
        $model = $order->add_checkout();
        if ($model == 1) {
            return redirect()->route('product')->with('success','Order Success!');
         }elseif ($model == 0){
            return redirect()->back()->with('error','Order failed!');
         }
    }
	/**
     * Lịch Sử Đơn Hàng
     */
	public function historyOder() {
        $cus_id = Auth::guard('cus')->user()->id;
        $orders = Order::where('customer_id', $cus_id)->get();
		return view('checkout.history',compact('orders'));
    }
    /**
     * Chi Tiết Lịch Sử Đơn Hàng
     */
    public function historyView($id) {

        $order = Order::where('id',$id)->get();
        $orderdetail = Orderdetail::with('product')->where('order_id',$id)->get();
       
		return view('checkout.historyView',compact('orderdetail','order'));
	}
    

}
