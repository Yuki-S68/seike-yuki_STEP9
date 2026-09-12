<h1>商品登録</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div>
        <label>商品名</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>価格</label>
        <input type="number" name="price">
    </div>

    <div>
        <label>商品説明</label>
        <textarea name="description"></textarea>
    </div>

    <div>
        <label>在庫数</label>
        <input type="number" name="stock">
    </div>


    <button type="submit">登録する</button>
</form>
