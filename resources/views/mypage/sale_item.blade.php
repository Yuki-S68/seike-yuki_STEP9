@extends('layouts.app_noheader')

@section('title', '出品商品詳細')

@section('content')
<div class="detail-card">
    <h1>出品商品詳細</h1>

    <div class="detail-info">
        <p><strong>商品名：</strong>{{ $product->name }}</p>
        <p><strong>説明：</strong>{{ $product->description }}</p>

        <p><strong>画像：</strong></p>
        @if ($product->img_path)
            <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->name }}" class="detail-image">
        @else
            <p>画像は登録されていません。</p>
        @endif

        <p><strong>金額：</strong>￥{{ number_format($product->price) }}</p>
    </div>

    <div class="detail-actions">
        <button onclick="location.href='{{ route('products.edit', $product->id) }}'" class="btn-common edit-btn">編集</button>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('削除してもよろしいですか？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除する</button>
        </form>

        <button onclick="location.href='{{ route('products.index') }}'" class="btn btn-back">戻る</button>
    </div>
</div>
@endsection
