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
            'kana'     => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザ名は必須です。',
            'username.max'      => 'ユーザー名は255文字以内で入力してください。',

            'email.required'    => 'メールアドレスは必須です。',
            'email.email'       => 'メールアドレスの形式が正しくありません。',
            'email.max'         => 'メールアドレスは255文字以内で入力してください。',

            'name.required'     => '名前は必須です。',
            'name.string'       => '名前は文字列で入力してください。',
            'name.max'          => '名前は255文字以内で入力してください。',

            'kana.string'       => 'カナは文字列で入力してください。',
            'kana.max'          => 'カナは255文字以内で入力してください。',
        ];
    }
}
