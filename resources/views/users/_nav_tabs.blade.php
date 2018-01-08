<nav>
    <ul class="nav nav-tabs border-0">
        <li class="nav-item">
            <a class="nav-link
            {{ active_class(if_route('users.show', $user->id)) }}" href="{{ route('users.show', $user->id) }}">发表的文章</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ active_class(if_uri_pattern('users/*/comments')) }}" href="{{ action('UsersController@comments', $user->id) }}">发表的评论</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ active_class(if_uri_pattern('users/*/followers')) }}" href="{{ action('UsersController@followers', $user->id) }}">追随者</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ active_class(if_uri_pattern('users/*/followings')) }}" href="{{ action('UsersController@followings', $user->id) }}">关注的人</a>
        </li>
    </ul>
</nav>
