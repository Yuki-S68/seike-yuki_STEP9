<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string|max:255',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '商品名',
            'price' => '価格',
            'description' => '商品説明',
            'stock' => '在庫数',
            'image' => '商品画像',
        ];
    }

    public function messages()
    {
        return [
            'price.integer' => '価格は数値で入力してください。',
        ];
    }
}
