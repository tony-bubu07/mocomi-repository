<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    // use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    protected $table = 'roles';

    public function getData()
    {
        $role_data = DB::table($this->table)->get();
        return $role_data;

    }

}

