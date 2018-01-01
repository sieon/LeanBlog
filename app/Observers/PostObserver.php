<?php

namespace App\Observers;

use App\Models\Post;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class PostObserver
{
    public function creating(Post $post)
    {
        //
    }

    public function updating(Post $post)
    {
        //
    }

    public function saving(Post $post)
    {
        $post->content = clean($post->content, 'user_post_content');
        $post->excerpt = make_excerpt($post->content);
    }
}
