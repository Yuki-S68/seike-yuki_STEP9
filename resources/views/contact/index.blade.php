@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('content')
<div class="contact">
    <div class="contact__inner">
        <h1 class="contact__title">お問い合わせフォーム</h1>

        @if ($errors->any())
            <ul class="contact__errors">
                @foreach ($errors->all() as $error)
                    <li class="contact__error">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" class="contact__form">
            @csrf

            <div class="contact__group">
                <label for="name" class="contact__label">名前</label>
                <input type="text" id="name" name="name" class="contact__input" value="{{ old('name') }}">
            </div>

            <div class="contact__group">
                <label for="email" class="contact__label">メールアドレス</label>
                <input type="email" id="email" name="email" class="contact__input" value="{{ old('email') }}">
            </div>

            <div class="contact__group">
                <label for="message" class="contact__label">お問い合わせ内容</label>
                <textarea id="message" name="message" class="contact__textarea">{{ old('message') }}</textarea>
            </div>

            <div class="contact__buttons">
                <button type="submit" class="contact__button contact__button--submit">送信</button>
                <a href="{{ url()->previous() }}" class="contact__button contact__button--back">戻る</a>
            </div>
        </form>
    </div>
</div>
@endsection
