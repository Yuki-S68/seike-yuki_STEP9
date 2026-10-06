@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<script src="{{ asset('js/favorite.js') }}"></script>

<div class="product-detail">
    <h1 class="product-detail__title">商品詳細</h1>

    <div class="product-detail__info">
        <p class="product-detail__text"><strong>商品名：</strong> {{ $product->name }}</p>
        <p class="product-detail__text"><strong>説明：</strong>{{ $product->description }}</p>

        <p class="product-detail__text"><strong>画像：</strong></p>
        <img src="{{ asset('storage/' . $product->img_path) }}"
             alt="{{ $product->name }}"
             class="product-detail__image">

        <p class="product-detail__text"><strong>金額：</strong> ￥{{ number_format($product->price) }}</p>
        <p class="product-detail__text"><strong>会社：</strong> {{ $product->company->company_name }}</p>

        <div class="product-detail__favorite">
            <button id="favorite-btn"
                    class="product-detail__favorite-button"
                    data-product-id="{{ $product->id }}"
                    @if ($product->favoritedBy(Auth::user())) style="color: red;" @endif>
                    <i class="fas fa-heart"></i>
            </button>

            <span id="favorite-count" class="product-detail__favorite-count">
                {{ $product->favorites()->count() }}
            </span>
        </div>
    </div>

    <div class="product-detail__actions">
            @csrf
            <a href="{{ route('products.buy', $product->id) }}"
               class="product-detail__button product-detail__button--cart">カートに追加</a>

            <a href="{{ route('products.index') }}"
               class="product-detail__button product-detail__button--back">戻る</a>
    </div>
</div>
@endsection