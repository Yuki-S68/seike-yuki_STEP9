@extends('layouts.app')

@section('title', '商品編集')

@section('content')
    <h1>商品編集</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>商品名</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>

        <div>
            <label>価格</label>
            <input type="number" name="price" value="{{ $product->price }}">
        </div>

        <div>
            <label>商品説明</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>

        <div>
            <label>在庫数</label>
            <input type="number" name="stock" value="{{ $product->stock }}">
        </div>

        <button type="submit">更新する</button>
    </form>

    <a href="{{ route('products.index') }}">一覧に戻る</a>
@endsection