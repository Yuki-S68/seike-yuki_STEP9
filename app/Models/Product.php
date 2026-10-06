<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;
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

    // 商品は1つの会社に属する
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // 商品は複数のお気に入りを持つ(1対多)
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // 特定のユーザーがこの商品をお気に入り登録しているか確認
    public function favoritedBy($user)
    {
        if (!$user) {
            return false;
        }

        return $this->favorites()->where('user_id', $user->id)->exists();
    }

}


