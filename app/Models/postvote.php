<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postvote extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'post_id',
        'vote',
    ];
}
