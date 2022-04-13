<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Requests\Shipping\ShippingAddRequest as ShipAddReq;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships = Shipping::paginate(5);
        return view('admin.shipping.index',compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Shipping $shipping)
    {
        return view('admin.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShipAddReq $request,Shipping $shipping)
    {
        
       // dd("FDgdg");
        $model = $shipping->add();
        
        if($model){
            return redirect()->route('shipping.index')->with('success','Add Successful Portfolio');
        }else{
            return redirect()->back()->with('error','Adding New Category Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        $model = $shipping;
        return view('admin.shipping.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(ShipAddReq $request, Shipping $shipping)
    {
        if ($shipping->update_record()) {
            return redirect()->route('shipping.index')->with('success','Update Catalog Successful');
         }else{
            return redirect()->back()->with('error','Update Category Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        if($shipping && $shipping->orderdetails->count() == 0){
            $shipping->delete();
            return redirect()->route('shipping.index')->with('success','Delete Category Successful');
        }else{
            return redirect()->route('shipping.index')->with('error','Category Removal Failed');
        }
    }
}
