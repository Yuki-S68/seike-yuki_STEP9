@extends('layouts.app')

@section('title', '購入確認')

@section('content')
<div class="purchase-confirm">
    <h1 class="purchase-confirm__title">購入確認</h1>

    <div class="purchase-confirm__info">
        <p class="purchase-confirm__text"><strong>商品名：</strong> {{ $product->name }}</p>
        <p class="purchase-confirm__text"><strong>説明：</strong> {{ $product->description }}</p>

        <img src="{{ asset('storage/' . $product->img_path) }}" class="purchase-confirm__image">

        <p class="purchase-confirm__text"><strong>金額：</strong> ￥{{ number_format($product->price) }}</p>
        <p class="purchase-confirm__text"><strong>会社：</strong> {{ $product->company->company_name }}</p>
        <p class="purchase-confirm__text"><strong>在庫：</strong> {{ $product->stock }}</p>
    </div>

    <div class="purchase-confirm__actions">

        <form action="{{ route('products.buyComplete', $product->id) }}"
              method="POST"
              class="purchase-confirm__form">
            @csrf

            <input type="number"
                   name="quantity"
                   class="purchase-confirm__input"
                   value="1"
                   min="1"
                   max="{{ $product->stock }}">

            @if ($product->stock > 0)
                <button type="submit" class="purchase-confirm__button purchase-confirm__button--primary">
                    購入する
                </button>
            @else
                <button type="button" class="purchase-confirm__button purchase-confirm__button--disabled" disabled>
                    在庫なし
                </button>
            @endif
        </form>

        <a href="{{ route('products.index') }}" class="purchase-confirm__button purchase-confirm__button--back">
            戻る
        </a>
    </div>
</div>
@endsection
