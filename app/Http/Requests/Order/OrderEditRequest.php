<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderEditRequest extends FormRequest
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
            'price' => 'required',
            'description' => 'required|max:300',
            'customer_id' => 'required',
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
            'name.required' => 'Please Enter Order Name!',
            'price.required' => 'Please Enter Your Order Total Name!',
            'description.required' => 'Please Enter an Order Description!',
            'description.max' => 'Please Do Not Enter More Than 300 Characters!',
            'customer_id.required' => 'Please Choose Customers To Order!',
        ];
    }
}
