@extends('layouts.app')

@section('title', '購入確認')

@section('content')
<main class="layout__main">
    <div class="product-detail">

        <h1 class="product-detail__title">購入確認</h1>
            <form action="{{ route('products.buyComplete', $product->id) }}" method="POST">
                @csrf

                <div class="product-detail__info">
                    <p class="product-detail__text"><strong>商品名：</strong> {{ $product->name }}</p>
                    <p class="product-detail__text"><strong>説明：</strong> {{ $product->description }}</p>

                    <div class="product-detail__image-wrap">
                        <p class="product-detail__text"><strong>画像：</strong></p>
                        <img src="{{ asset('storage/' . $product->img_path) }}"
                            alt="{{ $product->name }}"
                            class="product-detail__image">
                    </div>

                    <p class="product-detail__text"><strong>金額：</strong> ￥{{ number_format($product->price) }}</p>
                    <p class="product-detail__text"><strong>会社：</strong> {{ $product->company->company_name }}</p>
                    <p class="product-detail__text"><strong>在庫：</strong> {{ $product->stock }}</p>

                    <div class="product__buy-quantity-wrap">
                        <label for="quantity"><strong>数量：</strong></label>
                        <input type="number"
                            name="quantity"
                            id="quantity"
                            class="product__buy-quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}">
                    </div>

                    @if ($errors->has('quantity'))
                        <p class="product-detail__error">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                </div>

                <div class="product-detail__actions">
                    <button type="submit"
                            class="product-detail__button product-detail__button--primary">
                        購入する
                    </button>

                    <a href="{{ route('products.show', $product->id) }}"
                    class="product-detail__button product-detail__button--back">
                        戻る
                    </a>
                </div>
            </form>
    </div>
</main>
@endsection
