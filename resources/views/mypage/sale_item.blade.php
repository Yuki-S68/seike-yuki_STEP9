@extends('layouts.app_noheader')

@section('title', '出品商品詳細')

@section('content')
<div class="product-detail">
    <h1 class="product-detail__title">出品商品詳細</h1>

    <div class="product-detail__info">
        <p class="product-detail__text"><strong>商品名：</strong>{{ $product->name }}</p>
        <p class="product-detail__text"><strong>説明：</strong>{{ $product->description }}</p>

        <p class="product-detail__text"><strong>画像：</strong></p>
        @if ($product->img_path)
            <img src="{{ asset('storage/' . $product->img_path) }}"
                 alt="{{ $product->name }}"
                 class="product-detail__image">
        @else
            <p class="product-detail__text">画像は登録されていません。</p>
        @endif

        <p class="product-detail__text"><strong>金額：</strong>￥{{ number_format($product->price) }}</p>
    </div>

    <div class="product-detail__actions">
        <button onclick="location.href='{{ route('mypage.edit_item', $product->id) }}'"
                class="product-detail__button product-detail__button--edit">編集</button>

        <form action="{{ route('products.destroy', $product->id) }}"
              method="POST"
              onsubmit="return confirm('削除してもよろしいですか？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="product-detail__button product-detail__button--delete">削除する</button>
        </form>

        <button
            onclick="location.href='{{ route('products.index') }}'"
            class="product-detail__button product-detail__button--back">戻る</button>
    </div>
</div>
@endsection
