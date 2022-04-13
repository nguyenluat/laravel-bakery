<?php

namespace App\Http\Requests\Orderdetail;

use Illuminate\Foundation\Http\FormRequest;

class OrderdetailAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'upload' => 'required|mimes:jpeg,png,gif',
            'price' => 'required|max:6',
            'description' => 'required|max:300',
            'product_id' => 'required',
            'order_id' => 'required',
            'payment_id' => 'required',
            'ship_id' => 'required',

        ];
    }
    
    /**
     * Tin Nhắn Thông Báo Lỗi Cho Request
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please Enter a Detailed Order Name!',
            'email.required' => 'Please Enter Your Email to Order!',
            'phone.required' => 'Please Enter Phone Customer Order!',
            'address.required' => 'Please Enter Your Address!',
            'upload.required' => 'Please Donot Leave the Image Blank!',
            'upload.mimes' => 'The Image Folder Must Be In Correct Format (jpg, png, gif)!',
            'price.required' => 'Please Enter Product Price!',
            'price.max' => 'You Entered Too High!',
            'product_id.required' => 'Please Do Not Leave the Product Blank!',
            'order_id.required' => 'Please Do Not Leave Your Order Blank!',
            'payment_id.required' => 'Please Donot Leave the Payment Method blank!',
            'ship_id.required' => 'Please Do Not Leave The Shipping Method!',
            'description.required' => 'Please Enter Product Description!',
            'description.max' => 'Please Do Not Enter More Than 300 Characters!',
        ];
    }
}
