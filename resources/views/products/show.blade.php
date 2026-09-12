@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
    <h1>商品詳細</h1>

    <p>商品名：{{ $product->name }}</p>
    <p>価格：{{ $product->price }}円</p>
    <p>説明：{{ $product->description }}</p>
    <p>在庫数：{{ $product->stock }}</p>

    <a href="{{ route('products.edit', $product->id) }}">編集する</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit">削除する</button>
    </form>

    <a href="{{ route('products.index') }}">一覧に戻る</a>
@endsection