<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // お気に入り追加処理
    public function likeProduct(Request $request, Product $product)
    {
        $user = Auth::user();

        if (!$product->likedBy($user)) {
            Like::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);
        }

        return response()->json([
            'likes_count' => $product->likes()->count(),
        ]);
    }

    // お気に入り削除処理
    public function unlikeProduct(Request $request, Product $product)
    {
        $user = Auth::user();

        if ($product->likedBy($user)) {
            Like::where('product_id', $product->id)
                ->where('user_id', $user->id)
                ->delete();
        }

        return response()->json([
            'likes_count' => $product->likes()->count(),
        ]);
    }
}

