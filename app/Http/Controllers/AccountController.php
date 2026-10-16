<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountUpdateRequest;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('account.edit', compact('user'));
    }

    public function update(AccountUpdateRequest $request)
    {
        $user = Auth::user();

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'name_kanji'=> $request->name,
            'name_kana' => $request->kana,
        ]);

        return redirect()->route('mypage.index')->with('success', 'アカウント情報を更新しました！');
    }
}
