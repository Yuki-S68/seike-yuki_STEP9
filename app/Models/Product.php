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


