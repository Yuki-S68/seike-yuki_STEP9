<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Product $product)
    {
        $user = Auth::user();

        if ($product->favoritedBy($user)) {
            $product->favorites()->detach($user->id);
            $status = 'removed';
        } else {
            $product->favorites()->attach($user->id);
            $status = 'added';
        }

        return response()->json(['status' => $status]);
    }
}
