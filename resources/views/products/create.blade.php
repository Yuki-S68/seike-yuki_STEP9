@extends('layouts.app')

@section('title', '商品登録')

@section('content')
<div class="product-create">
    <h1 class="product-create__title">商品登録</h1>

    <form class="product-create__form"
          action="{{ route('products.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="product-create__group">
            <label for="name" class="product-create__label">商品名</label>
            <input type="text" name="name" class="product-create__input">
        </div>

        <div class="product-create__group">
            <label for="price" class="product-create__label">価格</label>
            <input type="number" name="price" class="product-create__input">
        </div>

        <div class="product-create__group">
        <label for="description" class="product-create__label">商品説明</label>
            <textarea name="description" class="product-create__textarea"></textarea>
        </div>

        <div class="product-create__group">
        <label for="stock" class="product-create__label">在庫数</label>
            <input type="number" name="stock" class="product-create__input">
        </div>

        <div class="product-create__group">
            <label for="image" class="product-create__label">商品画像</label>
            <input type="file" name="image" id="image" class="product-create__file">
        </div>

        <div class="product-create__actions">
            <a href="{{ route('products.index') }}"
               class="product-create__button product-create__button--back">戻る</a>

            <button type="submit" class="product-create__button product-create__button--submit">登録</button>
        </div>
    </form>
</div>
@endsection