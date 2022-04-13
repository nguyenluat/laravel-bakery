<?php

namespace App\Http\Requests\Shipping;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddRequest extends FormRequest
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
            'content' => 'required',
            'description' => 'required|max:300',
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
            'name.required' => 'Please Enter Coupon Code Name!',
             'name.unique' => 'Coupon Code Name Exists!',
             'content.required' => 'Please Enter Coupon Code Content!',
             'description.required' => 'Please Enter Discount Code Description!',
        ];
    }
    
}
