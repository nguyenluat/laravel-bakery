<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerForgotRequest extends FormRequest
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
    		'email' => 'required|email',
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
            'email.required' => 'Please Enter Your Email',
             'email.email' => 'Email must be in format (xxx@xxx.xxx)',
        ];
    }
}
