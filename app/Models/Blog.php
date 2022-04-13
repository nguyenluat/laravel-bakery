<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [ 'name', 'image', 'content', 'description', 'status'];


    /** 
     * 
    * Phương Thức Thêm Mới Tin Tức
    * @return blog object hoặc null
    *
    * */
    public function add() {

        $file = request()->upload;
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('uploads'),$file_name);



        $model = $this->create([
            'name' => request()->name,
            'image' => $file_name,
            'content' => request()->content,
            'description' => request()->description,
            'status' => request()->status,
        ]);
        
        return $model;
    }

    /** 
     * 
    * Phương Thức Chỉnh Sửa Tin Tức
    * @return blog object hoặc null
    *
    * */

    public function update_record(){

        $file = request()->upload;
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('uploads'),$file_name);

        $model = $this->update([
            'name' => request()->name,
            'image' => $file_name,
            'content' => request()->content,
            'description' => request()->description,
            'status' => request()->status,
        ]);
        return $model;
    }

    /** 
     * 
    * Phương Thức Xóa Sản Phẩm
    * @return product object hoặc null
    *
    * */
    public function blog_details() {
        return $this->hasMany(Blogdetail::class,'blog_id','id');
    }

}
