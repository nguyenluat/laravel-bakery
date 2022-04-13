<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddRequest extends FormRequest
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
    		'email' => 'required|email|unique:customer',
    		'phone' => 'required|unique:customer|min:10|max:10',
    		'address' => 'required',
    		'password' => 'required',
    		'confirm_password' => 'required|same:password',
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
             'email.unique' => 'Email already taken',
             'phone.required' => 'Please Enter Your Phone',
             'phone.unique' => 'Phone is already in use',
             'phone.min' => 'Phone Incorrect',
             'phone.max' => 'Inaccurate Phone',
             'address.required' => 'Please Enter Your Address',
             'password.required' => 'Please Enter Your Password',
             'confirm_password.required' => 'Please Enter Your Password Confirmation',
             'confirm_password.same' => 'Please Enter Your Password Not Match',
        ];
    }
}
