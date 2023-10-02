<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    // use HasFactory;

    protected $fillable = [
        'id',
        'book_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $table = 'likes';

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function book()
    {   //bookテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Book::class);
    }

    public function likes()
{
    return $this->hasMany(Like::class, 'book_id', 'book_id');
}
}
