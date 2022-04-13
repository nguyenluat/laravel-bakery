<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Order;

use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Requests\Orderdetail\OrderdetailAddRequest as OrderdtAddReq;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_details = Orderdetail::paginate();
        return view('admin.order-detail.index',compact('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $order = Order::all();
        $payment = Payment::all();
        $shipping = Shipping::all();
        return view('admin.order-detail.create',compact('product','order','payment','shipping'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderdtAddReq $request, Orderdetail $orderdetail)
    {
        $model = $orderdetail->add();
        if($model){
            return redirect()->route('order-detail.index')->with('success','Add New Product Success');
        }else{
            return redirect()->back()->with('error','Add New Product Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function show(Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderdetail $orderdetail)
    {
        $model = $orderdetail;
        $product = Product::all();
        $order = Order::all();
        $payment = Payment::all();
        $shipping = Shipping::all();
        return view('admin.order-detail.edit',compact('model','product','order','payment','shipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderdetail $orderdetail)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderdetail $orderdetail)
    {
        if($orderdetail){
            $orderdetail->delete();
            return redirect()->route('order-detail.index')->with('success','Deleted Product Success');
        }else{
            return redirect()->route('order-detail.index')->with('error','Delete Product Failed');
        }
    }
}
