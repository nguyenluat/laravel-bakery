<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryAddRequest as CatAddReq;
use App\Http\Requests\Category\CategoryEditRequest as CatEditReq;
use Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::paginate();
        return view('admin.category.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatAddReq $request, Category $category)
    {
        $model = $category->add();
        
        if($model){
            return redirect()->route('category.index')->with('success','Add Successful Portfolio');
        }else{
            return redirect()->back()->with('error','Adding New Category Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $model = $category;
        return view('admin.category.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CatEditReq $request, Category $category)
    {
        if ($category->update_record()) {
            return redirect()->route('category.index')->with('success','Update Catalog Successful');
         }else{
            return redirect()->back()->with('error','Update Category Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category && $category->products->count() == 0){
            $category->delete();
            return redirect()->route('category.index')->with('success','Delete Category Successful');
        }else{
            return redirect()->route('category.index')->with('error','Category Removal Failed');
        }
    }
}
