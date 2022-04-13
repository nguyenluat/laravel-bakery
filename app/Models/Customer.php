<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customer';

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password',
    ];

    /** 
     * 
    * Phương Thức Thêm Mới Danh Mục 
    * @return category object hoặc null
    *
    * */
    public function add() {

        $model = $this->create([
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'address' => request()->address,
            'password' => request()->password,
        ]);
        return $model;
    }

    public function orders() {
        return $this->hasMany(Order::class,'customer_id','id');
    }
    public function emails() {
        return $this->hasMany(Contact::class,'customer_id','id');
    }
    public function cmtproducts() {
        return $this->hasMany(Commentproduct::class,'customer_id','id');
    }
    public function cmtblogs() {
        return $this->hasMany(Commentblog::class,'customer_id','id');
    }
    public function stars() {
        return $this->hasMany(Starrating::class,'customer_id','id');
    }

}
