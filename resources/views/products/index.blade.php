@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">ログアウト</button>
</form>


    <h1>商品一覧</h1>

    @foreach ($products as $product)
        <div style="margin-bottom: 20px;">
            <h2>{{ $product->name }}</h2>
            <p>価格：{{ $product->price }}円</p>
            <p>{{ $product->description }}</p>

            <a href="{{ route('products.show', $product->id) }}">詳細を見る</a>

        </div>
    @endforeach
@endsection