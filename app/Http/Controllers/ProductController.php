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
        ]);

        //商品登録
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => 1,
            'company_id' => 1,
        ]);

        //商品一覧へのリダイレクト
        return redirect()->route('products.index');
    }
}
