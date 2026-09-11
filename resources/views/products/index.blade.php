<h1>商品一覧</h1>

@foreach ($products as $product)
    <div style="margin-bottom: 20px;">
        <h2>{{ $product->name }}</h2>
        <p>価格：{{ $product->price }}円</p>
        <p>{{ $product->description }}</p>
    </div>
@endforeach
