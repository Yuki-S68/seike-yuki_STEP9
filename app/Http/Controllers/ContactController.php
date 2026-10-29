<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        // フォーム表示
        return view('emails.contactsend');
    }

    // フォーム送信処理
    public function submitForm(ContactRequest $request)
    {
        // バリデーション済みのデータを取得
        $data = $request->validated();

        try {
            // 管理者宛にメール送信
            Mail::to(env('ADMIN_EMAIL'))->send(new ContactMail($data));
        } catch (\Exception $e) {
            // 送信失敗時のエラーメッセージ
            Log::error('メール送信エラー：' . $e->getMessage());
            return back()->with('error', 'メールの送信に失敗しました。後でもう一度お試しください。');
        }

        // 成功時のメッセージ、リダイレクト
        return redirect()->route('index')
                         ->with('success', 'お問い合わせが送信されました！');
    }
}
