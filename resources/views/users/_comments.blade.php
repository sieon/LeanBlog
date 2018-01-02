@if (count($comments))

<ul class="list-group list-group-flush mb-3">
    @foreach ($comments as $comment)
        <li class="list-group-item">
            <a href="{{ $comment->post->link(['#comment' . $comment->id]) }}">
                {{ $comment->post->title }}
            </a>

            <div class="comment-content" style="margin: 6px 0;">
                {!! $comment->content !!}
            </div>

            <div class="meta">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 回复于 {{ $comment->created_at->diffForHumans() }}
            </div>
        </li>
    @endforeach
</ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
{!! $comments->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4') !!}
{{-- {!! $posts->links('vendor.pagination.bootstrap-4') !!} --}}
