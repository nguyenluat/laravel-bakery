<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class GalleryEditRequest extends FormRequest
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
            'name.required' => 'Please Enter Your Library Name!',
             'name.unique' => 'Library Name Exists!',
             'upload.required' => 'Please Donot Leave the Image Blank!',
             'upload.mimes' => 'The Image Folder Must Be In Correct Format (jpg, png, gif)!',
             'description.required' => 'Please Enter a Library Description!',
             'description.max' => 'Please Do Not Enter More Than 300 Characters!',
        ];
    }
}
