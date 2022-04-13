<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;
use App\Http\Requests\Brand\BrandAddRequest as BrandAddReq;
use App\Http\Requests\Brand\BrandEditRequest as BrandEditReq;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandAddReq $request,Brand $brand)
    {
        $model = $brand->add();
        if($model){
            return redirect()->route('brand.index')->with('success','Add New Brand Success');
        }else{
            return redirect()->back()->with('error','New Brand Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(brand $brand)
    {
        $model = $brand;
        return view('admin.brand.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandEditReq $request, brand $brand)
    {
        if ($brand->update_record()) {
            return redirect()->route('brand.index')->with('success','Update Brand Success');
         }else{
            return redirect()->back()->with('error','Update Brand Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand)
    {
        if($brand){
            $brand->delete();
            return redirect()->route('brand.index')->with('success','Brand Removal Successful');
        }else{
            return redirect()->route('brand.index')->with('error','Brand Removal Failed');
        }
    }
}
