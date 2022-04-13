<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerAddRequest extends FormRequest
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
            
            'upload' => 'required|mimes:jpeg,png,gif',
            'title' => 'required',
            'link' => 'required',
            'content' => 'required',
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
            'upload.required' => 'Please Do not Leave The Picture Empty!',
             'upload.mimes' => 'The Photo Folder Must Be The Right Format (jpg, png, gif)!',
             'title.required' => 'Please Enter a Banner Name!',
             'title.unique' => 'The Banner Name Already Exists!',
             'link.required' => 'Please Enter a Banner Name!',
             'link.unique' => 'The Banner Name Already Exists!',
             'link.required' => 'Please Enter a Banner content!',
        ];
    }
}
