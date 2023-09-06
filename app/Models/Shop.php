<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Shop extends Model
{

    protected $table = 'items';

    protected $primaryKey = 'id';

    protected $fillable =
    [
        'id',
        'image',
        'item_name',
        'comment',
        'created_at',
        'update_at'
    ];
    public $timestamps = false;

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('review_id', $this->id)->first() !==null;
    }

    //use HasFactory;
}
