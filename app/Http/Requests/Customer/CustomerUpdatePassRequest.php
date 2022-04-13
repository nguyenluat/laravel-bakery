<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdatePassRequest extends FormRequest
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
            'current-password' => 'required',
			'password' => 'required',
			'password_confirmation' => 'required|same:password',
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
            'current-password.required' => 'Please Enter Your Current Password',
            'password.required' => 'Please Enter Password',
            'password_confirmation.required' => 'Please Enter Your Password',
            'password_confirmation.same' => 'Invalid Confirm Password',
        ];
    }
}
