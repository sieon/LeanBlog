<?php

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\PostNewComment;

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
        $post = $comment->post;
        $post->increment('comment_count', 1);

        //如果评论的作者不是文章的作者，才需要通知
        if ( ! $comment->user->isAuthorOf($post)) {
            $post->user->notify(new PostNewComment($comment));
        }
    }

    public function updating(Comment $comment)
    {
        //
    }
}
