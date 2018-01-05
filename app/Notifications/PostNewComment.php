<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Comment;

class PostNewComment extends Notification implements ShouldQueue
{
    use Queueable;

    public $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        // 注入回复实体，方便 toDatabase 方法中的使用
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        $post = $this->comment->post;
        $link = $post->link(['#comment' . $this->comment->id]);

        //  存入数据库里的数据
        return [
            'comment_id' => $this->comment->id,
            'comment_content' => $this->comment->content,
            'user_id' => $this->comment->user->id,
            'user_name' => $this->comment->user->name,
            'user_avatar' => $this->comment->user->avatar,
            'post_link' => $link,
            'post_id' => $post->id,
            'post_title' => $post->title,
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = $this->comment->post->link(['#comment' . $this->comment->id]);

        return (new MailMessage)
                    ->line('你的文章有新回复！')
                    ->action('查看回复', $url);
                    //->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
