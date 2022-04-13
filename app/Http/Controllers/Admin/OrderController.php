<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Customer;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Order\OrderAddRequest as OdAddReq;
use App\Http\Requests\Order\OrderEditRequest as OdEditReq;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at','DESC')->get();
        return view('admin.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cus = Customer::all();
        return view('admin.order.create',compact('cus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OdAddReq $request, Order $order)
    {
        $model = $order->add();
        
        if($model){
            return redirect()->route('order.index')->with('success','Add New Successful Orders');
        }else{
            return redirect()->back()->with('error','Add New Order failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $cus = Customer::all();
        $model = $order;
        return view('admin.order.edit',compact('model','cus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if ($order->update_record()) {
            return redirect()->back()->with('success','Update Đơn Hàng Thành Công');
         }else{
            return redirect()->back()->with('error','Update Đơn Hàng Không Thành Công');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order && $order->orderdetails->count() == 0){
            $order->delete();
            return redirect()->route('order.index')->with('success','Xóa Danh Mục Thành Công');
        }else{
            return redirect()->route('order.index')->with('error','Xóa Danh Mục Không Thành Công');
        }
    }


    public function viewOrder( $id, Request $request){
        $orderdetail = Orderdetail::with('product')->where('order_id',$id)->get();
        $order = Order::where('id',$id)->get();
        return view('admin.order-detail.index',compact('orderdetail','order')); 
    }

    public function processingOrder(Order $order)
    {
        
         $model =$order->update_status();
        
       
            return response()->json(
                [
                    'code' => $model
                ]
            );
       
    }



}
