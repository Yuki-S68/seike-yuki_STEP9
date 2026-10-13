<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Sale;
use App\Http\Requests\ProductRequest;

class MypageController extends Controller
{
    public function index()
    {
        //ログインユーザーの情報
        $user = Auth::user();

        //自分が出品した商品（商品番号昇順）
        $myProducts = Product::where('user_id', Auth::id())
                            ->orderBy('id', 'asc')
                            ->get();
        //自分が購入した商品（購入日昇順）
        $sales = Sale::where('user_id', Auth::id())
                    ->orderBy('created_at', 'asc')
                    ->get();
                    
        return view('mypage.index', compact('user', 'myProducts', 'sales'));
    }

    public function showSaleItem($id)
    {
        //ログインユーザーの出品商品を表示
        $product = Product::where('id', $id)
                          ->where('user_id', auth()->id())
                          ->firstOrFail();
        //sale_item.blade.phpを表示
        return view('mypage.sale_item', compact('product'));
    }

    public function editItem($id)
    {
        $product = Product::findOrFail($id);
        return view('mypage.edit_item', compact('product'));
    }

    public function createItem()
    {
        return view('mypage.create_item');
    }

    public function storeItem(ProductRequest $request)
    {
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
            'user_id' => Auth::id(),
            'company_id' => 1,
            'img_path' => $imgPath,
        ]);

        return redirect()->route('mypage.index');
    }
}
