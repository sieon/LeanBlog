<div class="card">
    <a href="{{ route('users.show', $post->user->id) }}">
        <img class="card-img-top" src="{{ $post->user->avatar }}">
    </a>
    <div class="card-body">
        <h3 class="card-title">{{ $post->user->name }}</h3>
        <p class="card-text">{{ $post->user->introduction }}</p>
        <div class="row text-center">
            <div class="col-4">
                <a class="card-link" href="{{ route('users.followings', $post->user->id) }}">
                    <strong class="h2 d-block">
                    {{ count($post->user->followings) }}
                    </strong>
                    <span class="text-muted">关注</span>
                </a>
            </div>
            <div class="col-4">
                <a class="card-link" href="{{ route('users.followers', $post->user->id) }}">
                    <strong class="h2 d-block">
                        {{ count($post->user->followers) }}
                    </strong>
                    <span class="text-muted">粉丝</span>
                </a>
            </div>
            <div class="col-4">
                <a class="card-link" href="{{ route('users.show', $post->user->id) }}">
                    <strong class="h2 d-block">
                        {{ $post->user->posts()->count() }}
                    </strong>
                    <span class="text-muted">文章</span>
                </a>
            </div>
        </div>
        @if (Auth::check())
            @if ($post->user->id !== Auth::user()->id)
                <div id="follow_form" class="mt-3">
                    @if (Auth::user()->isFollowing($post->user->id))
                        <form action="{{ route('followers.destroy', $post->user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-secondary btn-block">取消关注</button>
                        </form>
                    @else
                        <form action="{{ route('followers.store', $post->user->id) }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-block">关注 Ta</button>
                        </form>
                    @endif
                </div>
            @endif
        @endif
    </div>
</div>
