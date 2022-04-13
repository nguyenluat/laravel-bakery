<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateInfoRequest extends FormRequest
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
    		'email' => 'required|email',
    		'phone' => 'required',
    		'address' => 'required',
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
            'name.required' => 'Please Enter Your Name',
             'email.required' => 'Please Enter Your Email',
             'email.email' => 'Email must be in format (xxx@xxx.xxx)',
             'phone.required' => 'Please Enter Your Phone',
             'address.required' => 'Please Enter Your Address',
        ];
    }
}
