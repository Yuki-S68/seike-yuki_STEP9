@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
<h1>マイページ</h1>

<a href="{{ route('account.edit') }}" class="btn btn-primary">アカウント編集</a>
<p>ユーザ名：{{ $user->name }}</p>
<p>メール：{{ $user->email }}</p>
<p>名前：{{ $user->real_name }}</p>
<p>カナ：{{ $user->kana }}</p>

<h2>＜出品商品＞</h2>
<a href="{{ route('products.create') }}" class="btn btn-primary">新規登録</a>

<table>
    <thead>
        <tr>
            <th>商品番号</th><th>商品名</th><th>商品説明</th><th>料金(¥)</th><th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($myProducts as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ number_format($product->price) }}</td>
            <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-success">詳細</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>＜購入した商品＞</h2>
<table>
    <thead>
        <tr>
            <th>商品名</th><th>商品説明</th><th>料金(¥)</th><th>個数</th>
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
@endsection
