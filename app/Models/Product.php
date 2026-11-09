<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Company;
use App\Models\User;


class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'stock',
        'user_id',
        'company_id',
        'img_path',
    ];

    //　ユーザとのリレーションを定義
        public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ログインしているユーザー以外の商品を取得
    public function getOtherProducts($user_id)
    {
        return $this->where('user_id', '!=', $user_id)->get();
    }

    // 商品を検索する
    public function searchProducts($user_id, $keyword, $min_price, $max_price)
    {
        $query = $this->where('user_id', '!=', $user_id);

        // 商品名で検索
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        // 最低価格で検索
        if (!empty($min_price)) {
            $query->where('price', '>=', $min_price);
        }

        // 最高価格で検索
        if (!empty($max_price)) {
            $query->where('price', '<=', $max_price);
        }

        return $query->orderBy('id', 'asc')->get();
    }

    // 商品は1つの会社に属する
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // 商品は複数のお気に入りを持つ(1対多)
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // 特定のユーザーがこの商品をお気に入り登録しているか確認
    public function likedBy($user)
    {
        if (!$user) {
            return false;
        }

        return $this->likes()->where('user_id', $user->id)->exists();
    }

}


