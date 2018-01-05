<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'LeanBlog') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ active_class(if_route('home')) }}"><a href="{{ route('home') }}" class="nav-link">首页</a></li>
                <li class="nav-item {{ active_class(if_route('posts.index')) }}"><a href="{{ route('posts.index') }}" class="nav-link">文章</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}" class="nav-link">产品经理</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a href="{{ route('categories.show', 2) }}" class="nav-link">用户增长</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}" class="nav-link">问答</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}" class="nav-link">公告</a></li>
                <li class="nav-item {{ active_class(if_uri('about')) }}"><a href="{{ route('about') }}" class="nav-link">关于</a></li>
            </ul>

            <ul class="navbar-nav">
                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in"></i> 登录</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><i class="fa fa-sing-up"></i> 注册</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('posts.create') }}" class="nav-link"><i class="fa fa-plus mr-2"></i></a></li>
                    {{-- 消息通知标记 --}}
                    <li class="nav-item">
                      <a href="{{ route('notifications.index') }}" class="nav-link">
                          <span class="badge badge-{{ Auth::user()->notification_count > 0 ? 'danger' : 'light' }}" title="消息提醒">
                              {{ Auth::user()->notification_count }}
                          </span>
                      </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                           <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                               <img src="{{ Auth::user()->avatar }}" class="rounded-circle" width="30px" height="30px">
                           </span>
                           {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                          <a href="{{ route('users.show', Auth::user()->id) }}" class="dropdown-item"><i class="fa fa-user mr-2"></i>个人中心</a>

                          <a href="{{ route('users.edit', Auth::user()->id) }}" class="dropdown-item"><i class="fa fa-edit mr-2"></i>编辑资料</a>

                          <a href="{{ route('logout') }}" class="dropdown-item"
                             onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <i class="fa fa-sign-out mr-2"></i>退出
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</nav>
