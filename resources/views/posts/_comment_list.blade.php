<div class="comment-list">
    @foreach ($comments as $index => $comment)
        <div class="media"  name="comment{{ $comment->id }}" id="comment{{ $comment->id }}">
            <div class="avatar mr-3">
                <a href="{{ route('users.show', [$comment->user_id]) }}">
                    <img class="rounded-circle" alt="{{ $comment->user->name }}" src="{{ $comment->user->avatar }}"  style="width:48px;height:48px;"/>
                </a>
            </div>

            <div class="media-body">
                <div class="media-heading">
                    <a class="text-muted" href="{{ route('users.show', [$comment->user_id]) }}" title="{{ $comment->user->name }}">
                    {{ $comment->user->name }}
                    </a>
                    <span> •  </span>
                    <span class="text-muted dmeta" title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</span>

                    {{-- 回复删除按钮 --}}
                    <span class="meta text-muted pull-right">
                        <a c title="删除回复">
                        <i class="fa fa-trash text-muted" aria-hidden="true"></i>
                        </a>
                    </span>
                </div>
                <div class="comment-content">
                    {!! $comment->content !!}
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>
