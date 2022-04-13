<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = [
        'name',
        'image',
        'phone',
        'description',
        'status',
        'email',
        'address',
        'totalamount', 
        'quantity',
        'product_id', 
        'order_id'
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function order() {
        return $this->belongsTo('App\Models\Order','order_id','id');
    }
}
