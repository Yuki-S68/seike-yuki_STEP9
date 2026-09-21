<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        // products テーブルの全データを取得
        $products = Product::all();

        // Bladeに渡す
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {

        //画像ファイルの処理
        $imgPath = '';

        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('images', 'public');
        }

        //商品登録
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'user_id' => 1,
            'company_id' => 1,
            'img_path' => $imgPath,
        ]);

        //商品一覧へのリダイレクト
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        //１件のデータを取得
        $product = Product::findOrFail($id);

        //Bladeに渡す
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        //既存画像を保持
        $imgPath =$product->img_path;

        //新しい画像があれば上書き
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('images', 'public');
        }

        //更新処理
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'img_path' => $imgPath,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        //商品情報を取得
        $product = Product::findOrFail($id);

        //削除処理
        $product->delete();

    //一覧へ戻る
    return redirect()->route('products.index');
    }

}
