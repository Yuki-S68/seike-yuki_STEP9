<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'name'     => 'required|string|max:255',
            'kana'     => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザ名は必須です。',
            'email.required'    => 'メールアドレスは必須です。',
            'name.required'     => '名前は必須です。',
            'kana.required'     => 'カナは必須です。',
        ];
    }
}
