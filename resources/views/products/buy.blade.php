@extends('layouts.app')

@section('title', '購入確認')

@section('content')
<div class="detail-card">
    <h1>購入確認</h1>

    <div class="detail-info">
        <p><strong>商品名：</strong> {{ $product->name }}</p>
        <p><strong>説明：</strong> {{ $product->description }}</p>

        <img src="{{ asset('storage/' . $product->img_path) }}" class="detail-image">

        <p><strong>金額：</strong> ￥{{ number_format($product->price) }}</p>
        <p><strong>会社：</strong> {{ $product->company->company_name }}</p>
        <p><strong>在庫：</strong> {{ $product->stock }}</p>
    </div>

    <div class="detail-actions">

        <form action="{{ route('products.buyComplete', $product->id) }}" method="POST">
            @csrf

            <input type="number"
                   name="quantity"
                   class="form-control buy-quantity"
                   value="1"
                   min="1"
                   max="{{ $product->stock }}">

            @if ($product->stock > 0)
                <button type="submit" class="btn btn-primary purchase-btn">
                    購入する
                </button>
            @else
                <button type="button" class="btn btn-secondary purchase-btn" disabled>
                    在庫なし
                </button>
            @endif
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary back-btn">
            戻る
        </a>

    </div>
</div>
@endsection
