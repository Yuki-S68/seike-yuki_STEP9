<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //お気に入り追加処理
    public function addFavorite(Request $request, Product $product)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        if (!$product->favoritedBy($user)) {
            Favorite::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);
        }

        return response()->json([
            'status' => 'added',
            'favorites_count' => $product->favorites()->count(),
        ]);
    }

    //お気に入り削除処理
    public function removeFavorite(Request $request, Product $product)
    {
        $user = Auth::user();

        if ($product->favoritedBy($user)) {
            Favorite::where('product_id', $product->id)
            ->where('user_id', $user->id)
            ->delete();
        }

        return response()->json([
            'status' => 'removed',
            'favorites_count' => $product->favorites()->count(),
        ]);
    }
}
