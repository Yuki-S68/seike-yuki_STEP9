<h1>商品詳細</h1>

<p>商品名：{{ $product->name }}</p>
<p>価格：{{ $product->price }}円</p>
<p>説明：{{ $product->description }}</p>
<p>在庫数：{{ $product->stock }}</p>

<a href="{{ route('products.index') }}">一覧に戻る</a>
