@if (count($comments))

    <ul class="list-group list-group-flush">

        @foreach ($comments as $comment)
            <li class="list-group-item">
                <header>
                    <a class="h6 mr-3" href="{{ $comment->post->link(['#comment' . $comment->id]) }}">
                        {{ $comment->post->title }}
                    </a>
                    <span class="text-muted small">at {{ $comment->created_at->diffForHumans() }}</span>
                </header>
                <div class="mt-3">
                    {!! $comment->content !!}
                </div>


            </li>
        @endforeach

    </ul>

@else
   <div class="card-body empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<nav class="card-body">
    {!! $comments->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4') !!}
</nav>
