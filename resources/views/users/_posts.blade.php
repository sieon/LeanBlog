@if (count($posts))

    <ul class="list-group list-group-flush">
        @foreach ($posts as $post)
            <li id="post-{{ $post->id }}" class="list-group-item">
                <a class="text-dark" href="{{ $post->link() }}">
                    <h3 class="h6">{{ $post->title }}</h3>
                </a>

                <div class="post-meta text-muted small">
                    <span class="post-created-at">{{ $post->created_at->diffForHumans() }}</span>
                    ·
                    <a class="text-muted" href="{{ route('categories.show', $post->category->id) }}" title="{{ $post->category->name }}">
                      {{ $post->category->name }}
                    </a>
                    ·
                    <span class="view-count">
                        {{ $post->view_count }} 浏览
                    </span>
                </div>
            </li>
        @endforeach
    </ul>

@else
    <div class="card-body">
        <div class="empty-block">暂无数据 ~_~ </div>
    </div>
@endif
{{-- 分页 --}}
<nav class="card-body">
    {!! $posts->links('vendor.pagination.bootstrap-4') !!}
</nav>
