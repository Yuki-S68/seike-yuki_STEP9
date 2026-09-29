@extends('layouts.app_noheader')

@section('content')
<div class="account-edit">
    <h2 class="account-edit__title">アカウント情報編集</h2>

    @if(session('success'))
        <p class="account-edit__message--success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('account.update') }}" method="POST" class="account-edit__form">
        @csrf
        <div class="account-edit__group">
            <label for="username" class="account-edit__label">ユーザー名</label>
            <input type="text" id="username" class="account-edit__input" name="username" value="{{ old('username', $user->username) }}">
        </div>

        <div class="account-edit__group">
            <label for="email" class="account-edit__label">Eメール</label>
            <input type="email" id="email" class="account-edit__input" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="account-edit__group">
            <label for="name" class="account-edit__label">名前</label>
            <input type="text" id="name" class="account-edit__input" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="account-edit__group">
            <label for="kana" class="account-edit__label">カナ</label>
            <input type="text" id="kana" class="account-edit__input" name="kana" value="{{ old('kana', $user->kana) }}">
        </div>

        <div class="account-edit__actions">
            <button type="button" onclick="history.back()" class="account-edit__button account-edit__button--back">戻る</button>
            <button type="submit" class="account-edit__button account-edit__button--primary">更新</button>
        </div>
    </form>
</div>
@endsection