<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Form extends Model
{

    protected $table = 'forms';

    protected $primaryKey = 'id';

    protected $fillable =
    [
        'id',
        'text_title',
        'text',
        'item_id',
        'user_id',
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

?>
