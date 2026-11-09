<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BuyRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;



class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product_model = new Product();

        // 商品一覧を取得
        $products = $product_model->searchProducts(
            Auth::id(),
            $request->keyword,
            $request->min_price,
            $request->max_price
        );

        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $product_model = new Product();

        // 商品を検索
        $products = $product_model->searchProducts(
            Auth::id(),
            $request->keyword,
            $request->min_price,
            $request->max_price
        );

        // 検索結果を返す
        return view('products.partials.list', compact('products'));
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
        $product = Product::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::where('user_id', Auth::id())
            ->findOrFail($id);

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
        //商品情報を取得（自分が登録した商品だけ）
        $product = Product::where('user_id', Auth::id())
            ->findOrFail($id);

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

    public function buyComplete(BuyRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            // 商品を取得してロック
            $product = Product::where('id', $id)
                ->lockForUpdate()
                ->firstOrFail();

            // ロック取得後に在庫を再確認
            if ($product->stock < $request->quantity) {
                throw ValidationException::withMessages([
                    'quantity' => '在庫が不足しています。',
                ]);
            }

            // 在庫を減らす
            $product->decrement('stock', $request->quantity);

            // 購入履歴を作成
            Sale::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        });

        return redirect()->route('products.index')
            ->with('success', '購入が完了しました！');
    }

    public function purchase(PurchaseRequest $request)
    {
        try {
            $sale = DB::transaction(function () use ($request) {

                // 商品を取得してロック
                $product = Product::where('id', $request->product_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                // ロック取得後に在庫を再確認
                if ($product->stock < $request->quantity) {
                    throw ValidationException::withMessages([
                        'quantity' => '在庫が不足しています。',
                    ]);
                }

                // 在庫を減らす
                $product->decrement('stock', $request->quantity);

                // 購入履歴を作成
                return Sale::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                ]);
            });

            return response()->json([
                'message' => '購入が完了しました。',
                'order' => $sale,
            ], 201);

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return response()->json([
                'message' => '購入処理に失敗しました。',
            ], 500);
        }
    }
}