<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bookshelf extends Model
{
    // use HasFactory;
    
    protected $table = 'bookshelfs';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'book_id',
        'created_at',
        
    ];

    public function getData()
    {
        $bookshelfs_data = DB::table($this->table)->get();
        return $bookshelfs_data;

    }
}
