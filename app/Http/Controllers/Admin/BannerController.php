<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\Banner\BannerAddRequest as BannerAddReq;
use App\Http\Requests\Banner\BannerEditRequest as BannerEditReq;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerAddReq $request,Banner $banner)
    {
        $model = $banner->add();
        if($model){
            return redirect()->route('banner.index')->with('success','Thêm Mới Banner Thành Công');
        }else{
            return redirect()->back()->with('error','Thêm Mới Banner Không Thành Công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $model = $banner;
        return view('admin.banner.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerEditReq $request, Banner $banner)
    {
        if ($banner->update_record()) {
            return redirect()->route('banner.index')->with('success','Update Banner Success');
         }else{
            return redirect()->back()->with('error','Update Banner Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if($banner){
            $banner->delete();
            return redirect()->route('banner.index')->with('success','Banner Removal Successful');
        }else{
            return redirect()->route('banner.index')->with('error','Banner Removal Failed');
        }
    }
}
