<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\BlogAddRequest as BlogAddReq;
use App\Http\Requests\Blog\BlogEditRequest as BlogEditReq;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogAddReq $request, Blog $blog)
    {
        $model = $blog->add();
        if($model){
            return redirect()->route('blog.index')->with('success','Add New Successful News');
        }else{
            return redirect()->back()->with('error','Adding New News Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $model = $blog;
        return view('admin.blog.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogEditReq $request, Blog $blog)
    {
        if ($blog->update_record()) {
            return redirect()->route('blog.index')->with('success','Update News Success');
         }else{
            return redirect()->back()->with('error','Update News Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog && $blog->blog_details->count() == 0){
            $blog->delete();
            return redirect()->route('blog.index')->with('success','Deleted Product Success');
        }else{
            return redirect()->route('blog.index')->with('error','Delete Product Failed');
        }
    }
}
