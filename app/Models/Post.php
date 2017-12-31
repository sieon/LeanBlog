<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'category_id', 'tag_id', 'comment_count', 'view_count', 'last_comment_user_id', 'order', 'excerpt', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}