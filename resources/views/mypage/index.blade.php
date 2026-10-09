@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
<div class="mypage">
    <h1 class="mypage__title">マイページ</h1>

    <div class="mypage__user-info">
        <div class="mypage__user-left">
            <a href="{{ route('account.edit') }}" class="mypage__button mypage__button--edit">アカウント編集</a>
            <p>ユーザ名：{{ $user->name }}</p>
            <p>Eメール：{{ $user->email }}</p>
        </div>

        <div class="mypage__user-right">
            <p>名前：{{ $user->name_kanji }}</p>
            <p>カナ：{{ $user->name_kana }}</p>
        </div>
    </div>

    <h2 class="mypage__subtitle">＜出品商品＞</h2>

    <div class="mypage__create-wrap">
        <a href="{{ route('products.create') }}" class="mypage__button mypage__button--create">新規登録</a>
    </div>

    <table class="mypage__table">
        <thead>
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>料金(¥)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myProducts as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ number_format($product->price) }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="mypage__button mypage__button--detail">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mypage__subtitle">＜購入した商品＞</h2>

    <table class="mypage__table">
        <thead>
            <tr>
                <th>商品名</th>
                <th>商品説明</th>
                <th>料金(¥)</th>
                <th>個数</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->product->name }}</td>
                <td>{{ $sale->product->description }}</td>
                <td>{{ number_format($sale->product->price) }}</td>
                <td>{{ $sale->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
