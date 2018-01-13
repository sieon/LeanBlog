<div class="card-header bg-transparent">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link
            {{ active_class(if_route('users.show', $user->id)) }}" href="{{ route('users.show', $user->id) }}">Ta 的文章</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ active_class(if_uri_pattern('users/*/comments')) }}" href="{{ action('UsersController@comments', $user->id) }}">Ta 的评论</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ active_class(if_uri_pattern('users/*/followers')) }}" href="{{ action('UsersController@followers', $user->id) }}">Ta 的粉丝</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ active_class(if_uri_pattern('users/*/following')) }}" href="{{ action('UsersController@following', $user->id) }}">Ta 关注的人</a>
        </li>
    </ul>
</div>
