@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<div class="detail-card">
    <h1>商品詳細</h1>

    <div class="detail-info">
        <p><strong>商品名：</strong> {{ $product->name }}</p>
        <p><strong>説明：</strong>{{ $product->description }}</p>

        <p><strong>画像：</strong></p>
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="detail-image">

        <p><strong>金額：</strong> ￥{{ number_format($product->price) }}</p>
        <p><strong>会社：</strong> {{ $product->company }}</p>

        <div class="favorite-section">
            <button id="favorite-btn" class="border-0 bg-transparent"
                data-product-id="{{ $product->id }}"
                @if ($product->favoritedBy(Auth::user())) style="color: red;" @endif>
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>

    <div class="detail-actions">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">編集する</a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除する</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">一覧に戻る</a>
    </div>
</div>
@endsection