<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [ 'name', 'image', 'description', 'status'];

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
            'name' => request()->name,
            'image' => $file_name,
            'description' => request()->description,
            'status' => request()->status,
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
            'name' => request()->name,
            'image' => $file_name,
            'description' => request()->description,
            'status' => request()->status,
        ]);
        return $model;
      }
}
