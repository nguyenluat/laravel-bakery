<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductAddRequest as ProAddReq;
use App\Http\Requests\Product\ProductEditRequest as ProEditReq;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::paginate();
        return view('admin.product.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.product.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProAddReq $request, Product $product)
    {
        $model = $product->add();
        if($model){
            return redirect()->route('product.index')->with('success','Add New Product Success');
        }else{
            return redirect()->back()->with('error','Add New Product Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)

    {
        $model = $product;
        $cats = Category::all();
        return view('admin.product.edit',compact('model','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProEditReq $request, Product $product)
    {
        // dd($request);
        if ($product->update_record()) {
            return redirect()->route('product.index')->with('success','Product Update Successful');
         }else{
            return redirect()->back()->with('error','Product Update Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product && $product->order_details->count() == 0){
            $product->delete();
            return redirect()->route('product.index')->with('success','Deleted Product Success');
        }else{
            return redirect()->route('product.index')->with('error','Delete Product Failed');
        }
    }
}
