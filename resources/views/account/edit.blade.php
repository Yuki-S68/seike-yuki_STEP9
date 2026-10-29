@extends('layouts.app')

@section('content')
<div class="account-edit">
    <h2 class="account-edit__title">アカウント情報編集</h2>

    @if(session('success'))
        <p class="account-edit__message--success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('account.update') }}" method="POST" class="account-edit__form">
        @csrf
        <div class="account-edit__group">
            <label for="username" class="account-edit__label">ユーザ名</label>
            <input type="text" id="username" class="account-edit__input" name="username" value="{{ old('username', $user->name) }}">
            @error('username')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="account-edit__group">
            <label for="email" class="account-edit__label">Eメール</label>
            <input type="text" id="email" class="account-edit__input" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="account-edit__group">
            <label for="name" class="account-edit__label">名前</label>
            <input type="text" id="name" class="account-edit__input" name="name" value="{{ old('name', $user->name_kanji) }}">
            @error('name')
               <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="account-edit__group">
            <label for="kana" class="account-edit__label">カナ</label>
            <input type="text" id="kana" class="account-edit__input" name="kana" value="{{ old('kana', $user->name_kana) }}">
            @error('kana')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="account-edit__actions">
            <a href="{{ route('mypage.index') }}" class="account-edit__button account-edit__button--back">戻る</a>
            <button type="submit" class="account-edit__button account-edit__button--primary">更新</button>
        </div>
    </form>
</div>
@endsection