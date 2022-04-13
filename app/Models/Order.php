<?php

namespace App\Models;
use App\Cart;
use App\Models\Orderdetail;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

class Order extends Model
{
    protected $fillable = [ 'name', 'email', 'phone', 'address', 'description', 'status', 'customer_id','totalamount','payment_id','ship_id'];



    /** 
     * 
    * Phương Thức Thêm Mới Đơn Hàng
    * @return order object hoặc null
    *
    * */
    public function add() {

        $model = $this->create([
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'address' => request()->address,
            'description' => request()->description,
            'status' => request()->status,
            'customer_id' => request()->customer_id,
        ]);
        
        return $model;
    }
    /** 
     * 
    * Phương Thức Chỉnh Sửa Đơn Hàng
    * @return order object hoặc null
    *
    * */
    public function update_record(){

        $model = $this->update([
            'status' => request()->status,
        ]);
        return $model;
      }

    /** 
     * 
    * Phương Thức Xóa Đơn Hàng
    * @return order object hoặc null
    *
    * */
    public function orderdetails() {
        return $this->hasMany(Orderdetail::class,'order_id','id');
    }
    /** 
     * 
    * Phương Thức Thêm Mới Đơn Hàng
    * @return order object hoặc null
    *
    * */
    public function add_checkout() {
       
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $cart = new Cart($oldCart);
        // dd($cart);
        $cus_id = Auth::guard('cus')->user()->id;
        $model = $this->create([
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'address' => request()->address,
            'description' => request()->description,
            'customer_id' => $cus_id,
            'status'=>0,
            'totalamount'=>$cart->totalPrice,
            'payment_id'=>request()->payment_id,
            'ship_id'=>request()->ship_id
        ]);
        if ($model) {
            
            $order = $model->id;
            // dd($cart->products);
            foreach($cart->products as $product_id => $item) {
                $quantity = $item['quanty'];
                $price = $item['price'];
                Orderdetail::create([
                    'name' => request()->name,
                    'image'=>$item['productInfo']->image,
                    'email' => request()->email,
                    'phone' => request()->phone,
                    'address' => request()->address,
                    'description' => request()->description,
                    'status' =>0,
                    'totalamount' => $price,
                    'quantity' => $quantity,
                    'product_id'=> $product_id,
                    'order_id' => $order
                ]);

            }

    
            return 1 ;
        }
        else{
            return 0 ;
        }
    }

    public function update_status(){
       
      
        $order = Order::find(request()->order_id);
    
        if (request()->order_status==0) {
            $order->status = request()->order_status;
            $order->save();
            return 0;

        }
       
        else {
            $order->status = request()->order_status;
            $order->save();
            return 1;
        }
    }
}
