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

        <div class="product-edit__actions">
            <button type="submit"
                    class="product-edit__button product-edit__button--primary">更新する</button>

            <a href="{{ route('products.index') }}"
               class="product-edit__button product-edit__button--back">一覧に戻る</a>
        </div>
    </form>
</div>
@endsection