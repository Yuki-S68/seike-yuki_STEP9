@extends('layouts.app')

@section('title', '商品編集')

@section('content')
<div class="product-edit">
    <h1 class="product-edit__title">商品編集</h1>

    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          class="product-edit__form">
        @csrf
        @method('PUT')

        <div class="product-edit__group">
            <label for="name" class="product-edit__label">商品名</label>
            <input type="text" name="name" id="name"
                   value="{{ $product->name }}"
                   class="product-edit__input">
        </div>

        <div class="product-edit__group">
            <label for="price" class="product-edit__label">価格</label>
            <input type="number" name="price" id="price"
                   value="{{ $product->price }}"
                   class="product-edit__input">
        </div>

        <div class="product-edit__group">
            <label for="description" class="product-edit__label">商品説明</label>
            <textarea name="description" id="description"
                      class="product-edit__textarea">{{ $product->description }}</textarea>
        </div>

        <div class="product-edit__group">
            <label for="stock" class="product-edit__label">在庫数</label>
            <input type="number" name="stock" id="stock"
                   value="{{ $product->stock }}"
                   class="product-edit__input">
        </div>

        <div class="product-edit__group">
            <label for="image" class="product-edit__label">商品画像</label>
            @if ($product->img_path)
                <img src="{{ asset('storage/' . $product->img_path) }}"
                alt="{{ $product->name }}"
                class="product-edit__image">
            @endif
            <input type="file" name="image" id="image" class="product-edit__file">
        </div>

        <div class="product-edit__actions">
            <a href="{{ route('products.show', $product->id) }}"
               class="product-detail-edit__button product-detail-edit__button--back">戻る</a>

               <button type="submit"
                    class="product-detail-edit__button product-detail-edit__button--primary">更新</button>

        </div>
    </form>
</div>
@endsection