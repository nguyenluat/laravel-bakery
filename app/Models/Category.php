<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Category extends Model
{
    protected $fillable = [ 'name', 'slug', 'description', 'status'];

    /** 
     * 
    * Phương Thức Thêm Mới Danh Mục 
    * @return category object hoặc null
    *
    * */
    public function add() {

        $model = $this->create([
            'name' => request()->name,
            'slug' => Str::slug(request()->name),
            'description' => request()->description,
            'status' => request()->status,
        ]);
        
        return $model;
    }

    /** 
     * 
    * Phương Thức Chỉnh Sửa Danh Mục 
    * @return category object hoặc null
    *
    * */

    public function update_record(){

        $model = $this->update([
            'name' => request()->name,
            'slug' => Str::slug(request()->name),
            'description' => request()->description,
            'status' => request()->status,
        ]);
        return $model;
      }

    /** 
     * 
    * Phương Thức Xóa Danh Mục 
    * @return category object hoặc null
    *
    * */
    
    public function products() {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
