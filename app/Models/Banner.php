<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [ 'image', 'title', 'link','status','content'];

    /** 
     * 
    * Phương Thức Thêm Mới Sản Phẩm
    * @return product object hoặc null
    *
    * */
    public function add() {

        $file = request()->upload;
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('uploads'),$file_name);



        $model = $this->create([
            
            'image' => $file_name,
            'title' => request()->title,
            'link' => request()->link,
            'status' => request()->status,
            'content' => request()->content,
        ]);
        
        return $model;
    }
    /** 
     * 
    * Phương Thức Chỉnh Sửa Mới Sản Phẩm
    * @return product object hoặc null
    *
    * */

    public function update_record(){

        $file = request()->upload;
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('uploads'),$file_name);

        $model = $this->update([
            
            'image' => $file_name,
            'title' => request()->title,
            'link' => request()->link,
            'status' => request()->status,
            'content' => request()->content,
        ]);
        return $model;
      }
}
