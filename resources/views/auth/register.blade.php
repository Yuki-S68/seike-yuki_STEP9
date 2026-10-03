@extends('layouts.app')

@section('title', '新規登録')

@section('content')
<div class="register">

    <div class="register__header">
        <span class="register__brand">Laravel</span>
        <div class="register__nav">
            <a href="{{ route('login') }}" class="register__link">Login</a>
            <a href="{{ route('register') }}" class="register__link">Register</a>
        </div>
    </div>

    <div class="register__container">
        <div class="register__card">

            <h2 class="register__title">Register</h2>

            <form method="POST" action="{{ route('register') }}" class="register__form">
                        @csrf

                        <div class="register__group">
                            <label for="name" class="register__label">Name(ユーザ名)</label>
                            <input id="name"
                                   type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required autocomplete="name"
                                   autofocus
                                   class="register__input" >

                            @error('name')
                                    <span class="register__error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="register__group">
                            <label for="name_kanji" class="register__label">名前（漢字）</label>
                            <input id="name_kanji"
                                    type="text"
                                    name="name_kanji"
                                    value="{{ old('name_kanji') }}"
                                    autocomplete="name_kanji"
                                    class="register__input">

                                @error('name_kanji')
                                    <span class="register__error">{{ $message }}</span>
                                @enderror
                            </div>

                        <div class="register__group">
                                <label for="name_kana" class="register__label">名前（カナ）</label>
                                <input id="name_kana"
                                        type="text"
                                        name="name_kana"
                                        value="{{ old('name_kana') }}"
                                        autocomplete="name_kana"
                                        class="register__input">

                                @error('name_kana')
                                    <span class="register__error">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="register__group">
                                <label for="email" class="register__label">Email Address</label>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       class="register__input" >

                                @error('email')
                                    <span class="register__error">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="register__group">
                            <label for="password" class="register__label">Password</label>
                            <input id="password"
                                   type="password" 
                                   name="password"
                                   required
                                   autocomplete="new-password"
                                   class="register__input" >

                            @error('password')
                                <span class="register__error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="register__group">
                            <label for="password-confirm" class="register__label">Confirm Password</label>
                            <input id="password-confirm"
                                   type="password"
                                   name="password_confirmation"
                                   required
                                   autocomplete="new-password"
                                   class="register__input">
                        </div>

                        <div class="register__actions">
                            <button type="submit" class="register__button register__button--primary">Register</button>
                        </div>
                </form>
        </div>
    </div>
</div>
@endsection
