@extends('layouts.app')

@section('title', '商品登録')

@section('content')
<div class="detail-card">
    <h1>商品登録</h1>

    <form class="create-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="detail-info">
            <p><strong>商品名</strong></p>
            <input type="text" name="name" class="form-control">

            <p><strong>価格</strong></p>
                <input type="number" name="price" class="form-control">

            <p><strong>商品説明</strong></p>
                <textarea name="description" class="form-control"></textarea>

            <p><strong>在庫数</strong></p>
                <input type="number" name="stock" class="form-control">

                <label for="image"><strong>商品画像</strong></label>
            <div class="file-input-wrapper">
                <input type="file" name="image" id="image">
            </div>
        </div>
        <div class="detail-actions">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
</div>
@endsection