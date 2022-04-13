<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FrontendController@index')->name('index');
 Route::get('about','FrontendController@about')->name('about');
 Route::get('errer','FrontendController@errer')->name('errer');
 Route::get('blog','FrontendController@blog')->name('blog');
 Route::get('blog_detail/{id}','FrontendController@blog_detail')->name('blog_detail');
 Route::get('contact','FrontendController@contact')->name('contact');
 Route::get('gallery','FrontendController@gallery')->name('gallery');
 Route::get('products/{id}','FrontendController@products');
 Route::get('product','FrontendController@product')->name('product');

 Route::get('product_detail/{id}','FrontendController@product_detail')->name('product_detail');
 Route::get('viewcart','FrontendController@viewcart')->name('viewcart');
 Route::post('viewcartpost','FrontendController@viewcartpost');

 // Đăng Nhập Đăng Kí Đăng Xuất CusTomer
 Route::get('/logins', 'CustomerController@login')->name('customer.login');
 Route::post('/logins', 'CustomerController@post_login')->name('customer.Login');
 Route::get('/registers', 'CustomerController@register')->name('customer.register');
 Route::post('/registers', 'CustomerController@post_register')->name('customer.Register');

 Route::group(['prefix' => 'customer'], function() {

    Route::get('logout','CustomerController@logout')->name('customer.logout');
    Route::get('index','CustomerController@index')->name('customer.index');
   // Xem Thông Tin CusTomer
    Route::get('profile','CustomerController@profile')->name('customer.profile');
    // update Thông Tin CusTomer
    Route::get('update/{id}','CustomerController@updateInfo')->name('customer.updateInfo');
    Route::post('update/{id}','CustomerController@post_updateInfo')->name('customer.updateInfo');
     // update Mật Khẩu CusTomer
    Route::get('change_password/{id}','CustomerController@updatePass')->name('customer.updatePass');
    Route::post('change_password/{id}','CustomerController@post_updatePass')->name('customer.updatePass');
});
// Mật Khẩu CusTomer

Route::get('/resetpassword', 'CustomerController@resetPassword')->name('customer.resetpassword');
Route::post('/resetpassword', 'CustomerController@getResetPassword')->name('customer.resetpassword');
Route::get('/newpassword', 'CustomerController@NewPassword')->name('customer.newpassword');
Route::post('/newpassword', 'CustomerController@getNewPassword')->name('customer.newpassword');



// Cart
Route::get('/Add-Cart/{id}','FrontendController@AddCart');
Route::get('/Delete-Item-Cart/{id}','FrontendController@DeleteItemCart');
Route::get('/Delete-Item-viewCart/{id}','FrontendController@DeleteItemviewCart');
Route::get('/Save-Item-viewCart/{id}/{quanty}','FrontendController@SaveItemviewCart');
Route::get('/Saveall-Item-viewCart/{id}/{quanty}','FrontendController@SaveallItemviewCart');

Route::group(['prefix' => 'checkout','namespace' => 'Customer'], function() {
    // Đặt Hàng
   Route::get('index','CheckoutController@index')->name('checkout.index');
   Route::post('index','CheckoutController@post_index')->name('checkout.store');

   
   // Lịch Sử Đơn Hàng
   Route::get('historyOder','CheckoutController@historyOder')->name('checkout.historyOder');
   Route::get('historyView/{id}','CheckoutController@historyView')->name('checkout.historyView');
});

//search
Route::get('searchPrice','FrontendController@search')->name('searchPrice');
Route::get('/searchpro', 'FrontendController@getSearchPro')->name('searchpro');



Auth::routes();


Route::get('admin/login','Admin\AdminController@loginGet')->name('admin.loginGet');
Route::post('admin/login','Admin\AdminController@loginPost')->name('admin.loginPost');

 
 //route admin
 Route::group(['prefix' => 'admin','middleware' => 'admin' ,'namespace'=>'Admin'], function () {

    
 
    Route::get('index','AdminController@index')->name('admin.index');
    Route::get('logout','AdminController@logout')->name('admin.logout');
 
    // admin
    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'order' => 'OrderController',
        'order-detail' => 'OrderdetailController',
        'gallery' => 'GalleryController',
        'blog' => 'BlogController',
        'admincustomer' => 'CustomerController',
        'payment' => 'PaymentController',
        'shipping' => 'ShippingController',
        'banner' => 'BannerController',
        

    ]);
    Route::get('order.view/{id}','OrderController@viewOrder')->name('order.view');
   Route::get('order-processing','OrderController@processingOrder')->name('order.processing');
});



