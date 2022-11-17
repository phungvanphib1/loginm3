<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequet extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:3|max:255',
            // 'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6',
            'newpassword' => 'required|min:6',
            'renewpassword' => 'required|min:6',

        ];
    }
    public function messages()
    {
        return [
            // 'name.required' => ':attribute bắt buộc nhập',
            // 'name.min' => ':attribute bắt buộc :min kí tự trở lên',
            // 'email.required' => ':attribute bắt buộc nhập',
            // 'email.unique' => ':attribute đã tồn tại',
            // 'email.email' => ':attribute phải là một địa chỉ mail hợp lệ',
            'password.required' => ':attribute bắt buộc nhập',
            'password.min' => ':attribute bắt buộc :min kí tự trở lên',

            //đổi mật khẩu
            'newpassword.required' => ':attribute bắt buộc nhập',
            'newpassword.min' => ':attribute bắt buộc :min kí tự trở lên',
            'renewpassword.required' => ':attribute bắt buộc nhập',
            'renewpassword.min' => ':attribute bắt buộc :min kí tự trở lên',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'newpassword' => 'Mật khẩu mới',
            'renewpassword' => 'Mật khẩu xác nhận',
        ];
    }
}
