@if($posts->count())

    @foreach($posts as $post)
        <div id="post-{{ $post->id }}" class="w-100">

            <a class="text-dark" href="{{ $post->link() }}">
                <h3 class="card-title">{{ $post->title }}</h3>
            </a>

            <div class="post-meta my-3 text-muted d-flex justify-content-start">
                {{-- <span class="user mr-3">
                    <div class="media">
                        <img class="mr-2" src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" width="24" height="24">
                        <a class="h5 text-dark" href="{{ route('users.show', $post->user->id ) }}">{{ $post->user->name }}</a>
                    </div>
                </span> --}}

                <span class="mr-1">{{ $post->created_at->diffForHumans() }}</span>
                <span class="mr-1">·</span>
                <a class="text-muted" href="{{ route('categories.show', $post->category->id) }}" title="{{ $post->category->name }}">
                  {{ $post->category->name }}
                </a>
            </div>

            <p class="post-excerpt">{{ $post->excerpt }}</p>

        </div>
        <hr>
    @endforeach

    {!! $posts->links('vendor.pagination.bootstrap-4') !!}

@else

    <h3 class="text-center alert alert-info">暂无数据！</h3>

@endif
