<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    protected $fillable = ['content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
