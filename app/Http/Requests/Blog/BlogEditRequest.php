<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogEditRequest extends FormRequest
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
            'upload' => 'required|mimes:jpeg,png,gif',
            'content' => 'required',
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
            'name.required' => 'Please Enter News Name!',
            'upload.required' => 'Please Do Not Leave The Photo Blank !',
            'upload.mimes' => 'Image Folder Must Be In Correct Format(jpg, png, gif) !',
            'content.required' => 'Please Enter News Content !',
            'description.required' => 'Please Enter Information Description !',
        ];
    }
}
