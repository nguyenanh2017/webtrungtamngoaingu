<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormArticlesRequest extends FormRequest
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
            'title_news'        => 'required|min:25',
            'header'            => 'required|min:200|max:500',
            'content'           => 'required|min:200'
        ];

    }
    public function messages()
    {
        return [
            'title_news.required'       =>  "Tên bài viết không được để trống",
            'title_news.min'            =>  "Tên bài viết không được ít hơn 25 kí tự",
            'header.required'           =>  "Tóm tắt bài viết không được để trống",
            'header.min'                =>  "Tóm tắt bài viết không được ít hơn 200 kí tự",
            'header.max'                =>  "Tóm tắt bài viết không được nhiêu hơn 500 kí tự",
            'content.required'          =>  "Nội dung của bài viết không được để trống",
            'content.min'               =>  "Nội dung của bài viết không được ít hơn 200 kí tự"
        ];
    }
}
