@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="product-list">

    <h1 class="product-list__title">商品一覧</h1>

    @if (session('success'))
        <div class="product-list__alert product-list__alert--success">
            {{ session('success') }}
        </div>
    @endif


    <form  class="product-list__search-form" method="GET" action="{{ route('products.index') }}">
        <input type="text" name="keyword" placeholder="商品名を入力" class="product-list__input">
        <input type="number" name="min_price" placeholder="最低価格" class="product-list__input">
        <input type="number" name="max_price" placeholder="最高価格" class="product-list__input">
        <button type="submit" class="product-list__button product-list__button--search">検索</button>
    </form>

    <table class="product-list__table">
        <thead class="product-list__table-head">
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>画像</th>
                <th>料金(￥)</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="product-list__table-body">
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('storage/' . $product->img_path) }}" class="product-list__image"></td>
                <td>{{ number_format($product->price) }}</td>
                <td><a href="{{ route('products.show', $product->id) }}" class="product-list__button product-list__button--detail">詳細</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection