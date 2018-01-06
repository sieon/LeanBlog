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
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}" class="nav-link">无处安放</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a href="{{ route('categories.show', 2) }}" class="nav-link">WordPress</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}" class="nav-link">用户增长</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}" class="nav-link">日常随笔</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 5))) }}"><a href="{{ route('categories.show', 5) }}" class="nav-link">知识管理</a></li>
                <li class="nav-item {{ active_class(if_uri('about')) }}"><a href="{{ route('about') }}" class="nav-link">关于</a></li>
            </ul>

            <ul class="navbar-nav">
                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in"></i> 登录</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><i class="fa fa-sing-up"></i> 注册</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('posts.create') }}" class="nav-link"><i class="fa fa-plus mr-2"></i></a></li>

                    @if ( Auth::user()->notification_count > 0 )

                      <li class="nav-item">
                        <a href="{{ route('notifications.index') }}" class="nav-link">
                            <span class="badge badge-danger" title="消息提醒">
                                {{ Auth::user()->notification_count }}
                            </span>
                        </a>
                      </li>

                    @endif
                    {{-- 消息通知标记 --}}
                    {{-- <li class="nav-item">
                      <a href="{{ route('notifications.index') }}" class="nav-link">
                          <span class="badge badge-{{ Auth::user()->notification_count > 0 ? 'danger' : 'light' }}" title="消息提醒">
                              {{ Auth::user()->notification_count }}
                          </span>
                      </a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                           <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                               <img src="{{ Auth::user()->avatar }}" class="rounded-circle" width="30px" height="30px">
                           </span>
                           {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                          @can('manage_contents')
                              <a href="{{ url(config('administrator.uri')) }}" class="dropdown-item">
                                  <i class="fa fa-dashboard" aria-hidden="true"></i> 管理后台
                              </a>
                          @endcan

                          <a href="{{ route('users.show', Auth::user()->id) }}" class="dropdown-item"><i class="fa fa-user"></i> 个人中心</a>

                          <a href="{{ route('users.edit', Auth::user()->id) }}" class="dropdown-item"><i class="fa fa-edit"></i> 编辑资料</a>

                          <a href="{{ route('logout') }}" class="dropdown-item"
                             onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <i class="fa fa-sign-out"></i> 退出
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
