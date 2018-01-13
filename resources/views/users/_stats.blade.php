<div class="row text-center">
    <div class="col-4">
        <a class="card-link" href="{{ route('users.followings', $user->id) }}">
            <strong class="h2 d-block">
            {{ count($user->followings) }}
            </strong>
            <span class="text-muted">关注</span>
        </a>
    </div>
    <div class="col-4">
        <a class="card-link" href="{{ route('users.followers', $user->id) }}">
            <strong class="h2 d-block">
                {{ count($user->followers) }}
            </strong>
            <span class="text-muted">粉丝</span>
        </a>
    </div>
    <div class="col-4">
        <a class="card-link" href="{{ route('users.show', $user->id) }}">
            <strong class="h2 d-block">
                {{ $user->posts()->count() }}
            </strong>
            <span class="text-muted">文章</span>
        </a>
    </div>
</div>
