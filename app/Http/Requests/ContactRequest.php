<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'max:1000'],
        ];
    }

    public function message()
    {
        return [
            'name.requred' => '名前は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'message.required' => 'お問い合わせ内容は必須です。',
        ];
    }

}
