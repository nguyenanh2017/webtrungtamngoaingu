<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormFolderRequest extends FormRequest
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
            'name_fd'        => 'required|min:3',
        ];

    }
    public function messages()
    {
        return [
            'name_fd.required'       =>  "Tên thư mục không được để trống",
            'name_fd.min'            =>  "Tên thư mục không được ít hơn 3 kí tự",
        ];
    }
}
