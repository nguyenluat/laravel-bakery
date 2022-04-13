<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\Gallery\GalleryAddRequest as GaleAddReq;
use App\Http\Requests\Gallery\GalleryEditRequest as GaleEditReq;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::paginate();
        return view('admin.gallery.index',compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleAddReq $request,Gallery $gallery)
    {
        $model = $gallery->add();
        if($model){
            return redirect()->route('gallery.index')->with('success','New Photo Library Successful');
        }else{
            return redirect()->back()->with('error','New Photo Gallery Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $model = $gallery;
        return view('admin.gallery.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(GaleEditReq $request, Gallery $gallery)
    {
        if ($gallery->update_record()) {
            return redirect()->route('gallery.index')->with('success','Update Gallery Successful');
         }else{
            return redirect()->back()->with('error','Update Gallery Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery){
            $gallery->delete();
            return redirect()->route('gallery.index')->with('success','Photo Gallery Deletion Successful');
        }else{
            return redirect()->route('gallery.index')->with('error','Delete Gallery Failed ');
        }
    }
}
