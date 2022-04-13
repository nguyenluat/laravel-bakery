<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerNewPassRequest extends FormRequest
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
            'password' => 'required|min:8',
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
            'password.required' => 'Please Enter Your Password',
            'password.min' => 'Your Password Must Be At least 8 Characters',
            'confirm_password.required' => 'Please Confirm Your Password',
            'confirm_password.same' => 'Your Password Is Not Correct',
        ];
    }
}
