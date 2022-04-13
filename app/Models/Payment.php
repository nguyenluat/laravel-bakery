<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [ 'name', 'content', 'description', 'status'];

    /** 
     * 
    * Phương Thức Thêm Mới Thanh Toán
    * @return discount object hoặc null
    *
    * */
    public function add() {

        $model = $this->create([
            'name' => request()->name,
            'content' => request()->content,
            'description' => request()->description,
            'status' => request()->status,
        ]);
        
        return $model;
    }

    /** 
     * 
    * Phương Thức Chỉnh Sửa Mã Giảm Giá 
    * @return discount object hoặc null
    *
    * */
    public function update_record() {

        $model = $this->update([
            'name' => request()->name,
            'content' => request()->content,
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
    
    public function orderdetails() {
        return $this->hasMany(Orderdetail::class,'payment_id','id');
    }
}
