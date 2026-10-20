<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BuyRequest;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function index()
    {
        // ログインしているユーザー以外の商品を取得
        $products = Product::where('user_id', '!=', Auth::id())
                            ->orderBy('id', 'asc')
                            ->get();

        // Bladeに渡す
        return view('products.index', compact('products'));
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

        return redirect()->route('mypage.sale_item', ['id' => $product->id]);
    }

    public function destroy($id)
    {
        //商品情報を取得
        $product = Product::findOrFail($id);

        //削除処理
        $product->delete();

        //マイページへ戻る
        return redirect()->route('mypage.index');
    }

    public function buy($id)
    {
        $product = Product::findOrFail($id);
        return view('products.buy', compact('product'));
    }

    public function buyComplete(\App\Http\Requests\BuyRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        // 在庫チェック
        if ($request->quantity > $product->stock) {
            return back()->withErrors([
                'quantity' => '在庫より多い数量は購入できません。',
            ]);
        }

        //在庫を減らす
        $product->stock -= $request->quantity;
        $product->save();

        // 購入履歴を作成
        Sale::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('products.index')->with('success', '購入が完了しました！');
    }

    public function purchase(BuyRequest $request)
    {
        //商品取得
        $product = Product::findOrFail($request->product_id);

        //在庫チェック
        if ($product->stock < $request->quantity) {
            return response()->json([
                'message' => '在庫が不足しています。',
            ], 400);
        }

        DB::beginTransaction();
        try {
            // 購入履歴を作成
            $sale = Sale::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);

            // 在庫を減らす
            $product->decrement('stock', $request->quantity);

            DB::commit();

            return response()->json([
                'message' => '購入が完了しました。',
                'order' => $sale,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => '購入処理に失敗しました。',
            ], 500);
        }
    }
}