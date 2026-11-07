@extends('layouts.app')

@section('title', '商品登録')

@section('content')
<div class="product-create">
    <h1 class="product-create__title">商品登録</h1>

    <form class="product-create__form"
          action="{{ route('mypage.store_item') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="product-create__group">
            <label for="name" class="product-create__label">商品名</label>
            <input type="text" name="name" class="product-create__input"
                   value="{{ old('name') }}">

            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-create__group">
            <label for="price" class="product-create__label">価格</label>
            <input type="text" name="price" class="product-create__input"
                   value="{{ old('price') }}">

            @error('price')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-create__group">
        <label for="description" class="product-create__label">商品説明</label>
            <textarea name="description" class="product-create__textarea">{{ old('description') }}</textarea>

            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-create__group">
        <label for="stock" class="product-create__label">在庫数</label>
            <input type="text" name="stock" class="product-create__input"
                   value="{{ old('stock') }}">

            @error('stock')
                <p class="error-message">{{ $message }}</p>
            @enderror

        </div>

        <div class="product-create__group">
            <label for="image" class="product-create__label">商品画像</label>
            <input type="file" name="image" id="image" class="product-create__file">

            @error('image')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="product-create__actions">
            <button type="button"
                    onclick="location.href='{{ route('mypage.index') }}'"
                    class="product-button product-button--back">
                戻る
            </button>


            <button type="submit"
                    class="product-button product-button--primary">
                登録
            </button>
        </div>

    </form>
</div>
@endsection