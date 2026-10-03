@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<div class="login">

    <div class="login__header">
        <span class="login__brand">Laravel</span>
        <div class="login__nav">
            <a href="{{ route('login') }}" class="login__link">Login</a>
            <a href="{{ route('register') }}" class="login__link">Register</a>
        </div>
    </div>

    <div class="login__container">
        <div class="login__card">

            <h2 class="login__title">Login</h2>

            <form method="POST" action="{{ route('login') }}" class="login__form">
                @csrf

                <div class="login__group">
                    <label for="email" class="login__label">Email Address</label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="email"
                           autofocus
                           class="login__input">

                    @error('email')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__group">
                    <label for="password" class="login__label">Password</label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           class="login__input">

                    @error('password')
                        <span class="login__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__group login__group--remember">
                    <input type="checkbox" name="remember" id="remember" class="login__checkbox">
                    <label for="remember" class="login__checkbox-label">Remember Me</label>
                </div>

                <div class="login__actions">
                    <button type="submit" class="login__button login__button--primary">
                        Login
                    </button>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="login__button login__button--link">
                            Forgot Your Password?
                        </a>
                    @endif
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
