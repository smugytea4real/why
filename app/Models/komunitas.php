<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komunitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'name',
        'description',
        'slug',
    ];
}
