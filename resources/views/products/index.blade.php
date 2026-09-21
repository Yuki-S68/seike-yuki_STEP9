@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

    <h1>商品一覧</h1>

<form  class="search-form" method="GET" action="{{ route('products.index') }}">
    <input type="text" name="keyword" placeholder="商品名を入力">
    <input type="number" name="min_price" placeholder="最低価格">
    <input type="number" name="max_price" placeholder="最高価格">
    <button type="submit">検索</button>
</form>

<table>
    <thead>
        <tr>
            <th>商品番号</th>
            <th>商品名</th>
            <th>商品説明</th>
            <th>画像</th>
            <th>料金</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td><img src="{{ asset('storage/' . $product->img_path) }}" width="50"></td>
            <td>{{ number_format($product->price) }}</td>
            <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-success">詳細</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection