<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'name',
        'description',
        'slug', 
        'content',
    ];

    public function post()
    {
        return $this->belongsTo(related:Post::class);
    }

    public function user()
    {
        return $this->belongsTo(related:User::class);
    }
}
