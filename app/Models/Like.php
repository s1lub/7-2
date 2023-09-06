<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
namespace App\Models\Shop;

class Like extends Model
{
    use HasFactory;

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function review()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Shop::class);
    }
}
