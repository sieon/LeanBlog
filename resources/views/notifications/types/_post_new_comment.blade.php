<li class="media">
    <div class="avatar mr-3">
        <a href="{{ route('users.show', $notification->data['user_id']) }}">
        <img class="rounded-circle" alt="{{ $notification->data['user_name'] }}" src="{{ $notification->data['user_avatar'] }}"  style="width:48px;height:48px;"/>
        </a>
    </div>

    <div class="media-body">
        <div class="comment-header mb-2">
            <a href="{{ route('users.show', $notification->data['user_id']) }}">
                {{ $notification->data['user_name'] }}
            </a>

            评论了

            <a href="{{ $notification->data['post_link'] }}">{{ $notification->data['post_title'] }}</a>

            {{-- 回复删除按钮 --}}
            <span class="meta float-right text-muted" title="{{ $notification->created_at }}">
                <span class="fa fa-bell" aria-hidden="true"></span>
                {{ $notification->created_at->diffForHumans() }}
            </span>

        </div>

        <div class="comment-content">
            {!! $notification->data['comment_content'] !!}
        </div>
    </div>
</li>
<hr>
