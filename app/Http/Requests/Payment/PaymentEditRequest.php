<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentEditRequest extends FormRequest
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
            'name.required' => 'Please Enter Your Payment Method Name!',
             'content.required' => 'Please Enter Your Payment Method Content!',
             'description.required' => 'Please Enter Payment Method Description!',
             'description.max' => 'Please Do Not Enter More Than 300 Characters!',
        ];
    }
}
