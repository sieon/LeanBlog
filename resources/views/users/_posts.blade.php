@if (count($posts))

    <div class="card-columns">
        @foreach ($posts as $post)
            <div id="post-{{ $post->id }}" class="card border-0 bg-light">
                <div class="card-body">
                    <a href="{{ $post->link() }}">
                        <h3 class="card-title h5">{{ $post->title }}</h3>
                    </a>

                    <div class="post-meta my-3 text-muted">
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

                    <p class="card-text">{{ $post->excerpt }}</p>
                </div>
            </div>
        @endforeach
    </div>

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
{{-- 分页 --}}
<nav class="d-flex justify-content-center">
    {!! $posts->links('vendor.pagination.bootstrap-4') !!}
</nav>
