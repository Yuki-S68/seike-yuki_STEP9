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
    
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/\A[\x21-\x7E]+\z/',
            ],
    
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/\A[ぁ-んァ-ヶー一-龠々〆ヵヶ\s　]+\z/u',
            ],
    
            'kana' => [
                'nullable',
                'string',
                'max:255',
                'regex:/\A[ァ-ヶー　]+\z/u',
            ],
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
            'email.regex'       => 'メールアドレスは半角英数字と半角記号で入力してください。',


            'name.required'     => '名前は必須です。',
            'name.string'       => '名前は文字列で入力してください。',
            'name.max'          => '名前は255文字以内で入力してください。',
            'name.regex'        => '名前（漢字）は日本語で入力してください。',

            'kana.string'       => 'カナは文字列で入力してください。',
            'kana.max'          => 'カナは255文字以内で入力してください。',
            'kana.regex'        => '名前（カナ）は全角カタカナで入力してください。',
        ];
    }
}
