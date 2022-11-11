<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories|min:2'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute bắt buộc nhập',
            'name.unique' => ':attribute đã tồn tại',
            'name.min' => ':attribute bắt buộc lớn hơn :min kí tự',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên Danh Mục'
        ];
    }
}
