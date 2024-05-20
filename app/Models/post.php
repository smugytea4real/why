<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'komunitas_id',
        'title',
        'url',
        'slug',
        'description',
    ];
}
