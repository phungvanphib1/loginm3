<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products|min:3',
            'price' => 'required',
            'amount' => 'required',
            'description' => 'required|min:6',
            'image' => 'required',
            'category_id' => 'required',
        ];
    }

        public function messages(){
        return [
            'name.required' => ':attribute bắt buộc nhập',
            'name.unique' => ':attribute đã tồn tại',
            'name.min' => ':attribute bắt buộc lớn hơn :min kí tự',
            'price.required' => ':attribute bắt buộc nhập',
            'amount.required' => ':attribute bắt buộc nhập',
            'description.required' => ':attribute bắt buộc nhập',
            'description.min' => ':attribute bắt buộc lớn hơn :min kí tự',
            'category_id.required' => 'Bắt buộc chọn :attribute',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên sản phẩm',
            'quantity'=>'Số lượng sản phẩm',
            'price'=>'Giá',
            'amount'=>'Số lượng sản phẩm',
            'description'=>'Mô tả',
            'image'=>'File',
            'category_id'=>'Loại sản phẩm',
        ];
    }
}

