@if (count($comments))

    <div class="card-columns">

        @foreach ($comments as $comment)
            <div class="card card-body border-0 bg-light">
                <a href="{{ $comment->post->link(['#comment' . $comment->id]) }}">
                    {{ $comment->post->title }}
                </a>
                <div class="my-3">
                    {!! $comment->content !!}
                </div>

                <div class="small text-muted">
                    <span class="fa fa-clock-o" aria-hidden="true"></span> {{ $comment->created_at->diffForHumans() }}
                </div>
            </div>
        @endforeach

    </div>

@else
   <div class="card-body empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<nav class="d-flex justify-content-center">
  {!! $comments->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4') !!}
</nav>
