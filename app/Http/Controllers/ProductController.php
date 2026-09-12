<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'stock' => 'required|integer',
        ]);

        //商品登録
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'user_id' => 1,
            'company_id' => 1,
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

    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'stock' => 'required|integer',
        ]);

        //商品を取得
        $product = Product::findOrFail($id);

        //更新処理
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
        ]);
    //一覧へ戻る
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
