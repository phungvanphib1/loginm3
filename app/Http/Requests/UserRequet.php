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
                'name' => 'required|min:3|max:255',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|min:6|max:50',
        ];

    }
    public function messages(){
        return [
            'name.required' => ':attribute bắt buộc nhập',
            'name.min' => ':attribute bắt buộc :min kí tự trở lên',
            'email.required' => ':attribute bắt buộc nhập',
            'email.unique' => ':attribute đã tồn tại',
            'password.required' => ':attribute bắt buộc nhập',
            'password.required' => ':attribute bắt buộc :min kí tự trở lên',
        ];
    }
}
