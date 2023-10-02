<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    // use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'cover_path',
        'author',
        'price',
        'book_kind_id',
        'book_evaluation_id',
        'created_at',
        'updated_at',
    ];

    protected $table = 'books';

    public function getData()
    {
        $books_data = DB::table($this->table)->get();
        return $books_data;
    }

    /**
     * Likeモデルとのリレーションの定義
     * いいねされているかを判定するメソッド
     */

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool
    {
        return Like::where('user_id', $user->id)->where('book_id', $this->id)->first() !== null;
    }
}
