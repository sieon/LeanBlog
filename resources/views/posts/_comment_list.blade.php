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
                    @can('destroy', $comment)
                        <span class="meta text-muted pull-right">
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm float-left">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </span>
                    @endcan
                </div>
                <div class="comment-content">
                    {!! $comment->content !!}
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>
