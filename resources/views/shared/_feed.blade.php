@if (count($feed_items))
    <div class="card-columns">
        @foreach ($feed_items as $post)
            {{-- <div class="col-md-4"> --}}
                <div id="post-{{ $post->id }}" class="card">
                    <div class="card-body">
                        <a class="text-dark" href="{{ $post->link() }}">
                            <h3 class="card-title h5">{{ $post->title }}</h3>
                        </a>

                        <div class="post-meta my-3 text-muted">
                            <span class="user">
                            {{-- <a href="{{ route('users.show', Auth::user()->id) }}">{{ $user->name }}</a> --}}
                            </span>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                            <a class="text-muted" href="{{ route('categories.show', $post->category->id) }}" title="{{ $post->category->name }}">
                              {{ $post->category->name }}
                            </a>
                        </div>

                        <p class="post-excerpt card-text">{{ $post->excerpt }}</p>

                        {{-- <p><a class="btn btn-secondary btn-sm" href="{{ $post->link() }}">阅读全文</a></p> --}}
                    </div>
                </div>
            {{-- </div> --}}
        @endforeach
    </div>
    <nav class="page-pagination mt-5">
      {!! $feed_items->links('vendor.pagination.bootstrap-4') !!}
    </nav>
@elseif(!count($feed_items))
    @include('posts._post')
@endif
