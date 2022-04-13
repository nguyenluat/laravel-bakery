<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'upload' => 'required|mimes:jpeg,png,gif',
            'price' => 'required|max:6',
            'sale_price' => 'max:6',
            'category_id' => 'required',
            'description' => 'required',
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
            'name.required' => 'Please Enter Product Name!',
            'name.unique' => 'Product Name Exists!',
            'upload.required' => 'Please Donot Leave the Image Blank!',
            'upload.mimes' => 'The Image Folder Must Be In Correct Format (jpg, png, gif)!',
            'price.required' => 'Please Enter Product Price!',
            'price.max' => 'You Entered Too High!',
            'category_id.required' => 'Please Do Not Leave Product List blank!',
            'description.required' => 'Please Enter Product Description!',
        ];
    }
}
