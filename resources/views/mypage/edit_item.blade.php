@extends('layouts.app_noheader')

@section('title', '商品編集')

@section('content')
<div class="edit-card">
    <h1>出品商品編集</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
        </div>

        <div class="form-group">
            <label for="price">価格</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}">
        </div>

        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}">
        </div>

        <div class="form-group">
            <label for="img_path">商品画像</label>
            @if ($product->img_path)
                <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->name }}" class="preview-image">
            @endif
            <input type="file" name="img_path" id="img_path">
        </div>

        <div class="form-actions">
            <button type="button" onclick="location.href='{{ route('mypage.sale_item', ['id' => $product->id]) }}'" class="btn-back">戻る</button>
            <button type="submit" class="btn-common">更新</button>
        </div>
    </form>
</div>
@endsection