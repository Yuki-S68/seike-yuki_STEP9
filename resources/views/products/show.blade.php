@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<div class="detail-card">
    <h1>商品詳細</h1>

    <div class="detail-info">
        <p><strong>商品名：</strong> {{ $product->name }}</p>
        <p><strong>説明：</strong>{{ $product->description }}</p>

        <p><strong>画像：</strong></p>
        <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->name }}" class="detail-image">

        <p><strong>金額：</strong> ￥{{ number_format($product->price) }}</p>
        <p><strong>会社：</strong> {{ $product->company->company_name }}</p>

        <div class="favorite-section">
            <button id="favorite-btn" class="border-0 bg-transparent"
                data-product-id="{{ $product->id }}"
                @if ($product->favoritedBy(Auth::user())) style="color: red;" @endif>
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>

    <div class="detail-actions">

            @csrf
            <a href="{{ route('products.buy', $product->id) }}" class="btn btn-primary cart-btn">カートに追加</a>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
    </div>
</div>
@endsection