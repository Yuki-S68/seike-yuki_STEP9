@extends('layouts.app')

@section('title', '商品編集')

@section('content')
<div class="product-edit">
    <h1 class="product-edit__title">出品商品編集</h1>

    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="product-edit__form">
        @csrf
        @method('PUT')

        <div class="product-edit__group">
            <label for="name" class="product-edit__label">商品名</label>
            <input type="text" name="name" id="name" class="product-edit__input" 
                   value="{{ old('name', $product->name) }}">
        </div>

        <div class="product-edit__group">
            <label for="price" class="product-edit__label">価格</label>
            <input type="number" name="price" id="price" class="product-edit__input"
                   value="{{ old('price', $product->price) }}">
        </div>

        <div class="product-edit__group">
            <label for="description" class="product-edit__label">商品説明</label>
            <textarea name="description" id="description" class="product-edit__textarea">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="product-edit__group">
            <label for="stock" class="product-edit__label">在庫数</label>
            <input type="number" name="stock" id="stock" class="product-edit__input"
                   value="{{ old('stock', $product->stock) }}">
        </div>

        <div class="product-edit__group">
            <label for="img_path" class="product-edit__label">商品画像</label>

            @if ($product->img_path)
                <img src="{{ asset('storage/' . $product->img_path) }}"
                     alt="{{ $product->name }}"
                     class="product-edit__image">
            @endif

            <input type="file" name="img_path" id="img_path" class="product-edit__file">
        </div>

        <div class="product-edit__actions">
            <button type="button"
                    onclick="location.href='{{ route('mypage.sale_item', ['id' => $product->id]) }}'"
                    class="product-edit__button product-edit__button--back">戻る</button>
            <button type="submit"
                    class="product-edit__button product-edit__button--primary">更新</button>
        </div>
    </form>
</div>
@endsection