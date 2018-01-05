<?php

namespace App\Observers;

use App\Models\Post;
use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;

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
        // XSS 过滤
        $post->content = clean($post->content, 'user_post_content');

        // 生成话题摘录
        $post->excerpt = make_excerpt($post->content);

    }

    public function saved(Post $post)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $post->slug) {
            //$post->slug = app(SlugTranslateHandler::class)->translate($post->title);
            // 推送任务到队列
            dispatch(new TranslateSlug($post));
        }
    }

    public function deleted(Post $post)
    {
        \DB::table('comments')->where('post_id', $post->id)->delete();
    }
}
