@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<script src="{{ asset('js/like.js') }}"></script>

<main class="layout__main">
    <div class="product-detail">
        <h1 class="product-detail__title">商品詳細</h1>

        <div class="product-detail__info">
            <p class="product-detail__text"><strong>商品名：</strong> {{ $product->name }}</p>
            <p class="product-detail__text"><strong>説明：</strong>{{ $product->description }}</p>

            
        <div class="product-detail__image-wrap">
            <p class="product-detail__text"><strong>画像：</strong></p>
            <img src="{{ asset('storage/' . $product->img_path) }}"
                alt="{{ $product->name }}"
                class="product-detail__image">
        </div>

            <p class="product-detail__text"><strong>金額：</strong> ￥{{ number_format($product->price) }}</p>
            <p class="product-detail__text"><strong>会社：</strong> {{ $product->company->company_name }}</p>

            <div class="product-detail__like">
                <button id="like-btn"
                        class="product-detail__like-button"
                        data-product-id="{{ $product->id }}"
                        @if ($product->likedBy(Auth::user())) style="color: red;" @endif>
                    <i class="fas fa-heart"></i>
                </button>
                <span id="like-count">{{ $product->likes()->count() }}</span>
            </div>
        </div>

        <div class="product-detail__actions">
                @csrf
                <a href="{{ route('products.buy', $product->id) }}"
                class="product-button product-button--primary">カートに追加</a>

                <a href="{{ route('products.index') }}"
                class="product-button product-button--back">戻る</a>
        </div>
    </div>
</main>    
@endsection