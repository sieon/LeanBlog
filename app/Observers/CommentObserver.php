<?php

namespace App\Observers;

use App\Models\Comment;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class CommentObserver
{
    public function creating(Comment $comment)
    {
        $comment->content = clean($comment->content, 'user_post_content');
    }

    public function created(Comment $comment)
    {
        $comment->post->increment('comment_count', 1);
    }

    public function updating(Comment $comment)
    {
        //
    }
}
