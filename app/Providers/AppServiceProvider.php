<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\Banner;
use App\Models\Customer;
use App\Models\Orderdetail;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('*',function($view){
            $view->with([
                // Time
                'datetime' => Carbon::now('Asia/Ho_Chi_Minh'),
                // giỏ hàng
                // Hệ Thống
                'product_admin' => Product::all(),
                'category_admin' => Category::all(),
                'customer_admin' => Customer::all(),
                'order_admin' => Order::all(),
                'blog_admin' => Blog::all(),
                'gallery_admin' => Gallery::all(),
                'payment_admin' => Payment::all(),
                'shipping_admin' => Shipping::all(),
                'banner_admin' => Banner::all(),
                'orderdetail_admin' => Orderdetail::all(),
            ]);
        });
        
        

        
    }
}
