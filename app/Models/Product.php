<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;


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

    public function favoritedBy($user)
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

}


