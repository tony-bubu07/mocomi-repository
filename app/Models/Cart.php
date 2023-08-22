<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    // use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'book_id',
    ];

    protected $table = 'carts';

    public function getData()
    {
        $carts_data = DB::table($this->table)->get();
        return $carts_data;

    }
}
