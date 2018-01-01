@if (count($posts))

<ul class="list-group list-group-flush mb-3">
    @foreach ($posts as $post)
        <li class="list-group-item">
            <a href="{{ $post->link() }}">
                {{ $post->title }}
            </a>
            <span class="meta pull-right">
                {{ $post->view_count }} 浏览
                <span> ⋅ </span>
                {{ $post->created_at->diffForHumans() }}
            </span>
        </li>
    @endforeach
</ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
{!! $posts->links('vendor.pagination.bootstrap-4') !!}
