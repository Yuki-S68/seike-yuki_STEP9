<tbody class="product-list__table-body">
    @forelse ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>
            <img src="{{ asset('storage/' . $product->img_path) }}" class="product-list__image">
        </td>
        <td>{{ number_format($product->price) }}</td>
        <td>
            <a href="{{ route('products.show', $product->id) }}" class="product-list__button product-list__button--detail">詳細</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center">該当する商品はありません。</td>
    </tr>
    @endforelse
</tbody>
