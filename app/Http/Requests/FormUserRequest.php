<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUserRequest extends FormRequest
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
            'name'               => 'required|min:6|max:40',
            'email'              => 'required|email',
            'password'           => 'required|confirmed|min:6|max:40',
            'level'              => 'min:1',
        ];

    }
    public function messages()
    {
        return [
            'name.required'      => 'Tên không được để trống',
            'name.min'           => 'Tên không được ít hơn 6 kí tự',
            'name.max'           => 'Tên không được dài hơn 40 kí tự',
            'email.email'        => 'Phải nhập vào đúng email',
            'email.required'     => 'Tên không được để trống',
            'password.required'  => 'Mật khẩu không được để trống',
            'password.confirmed' => "Nhập lại mật khẩu chưa trùng",
            'password.min'       => "Mật khẩu không được ngắn hơn 6 kí tự",
            'password.max'       => "Mật khẩu không được dài hơn 40 kí tự",
            'level.min'          => "Bạn chưa chọn quyền cho người dùng"

        ];
    }
}
