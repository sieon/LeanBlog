<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Leanblog') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">首页</a></li>
            <li class="nav-item"><a href="{{ url('posts') }}" class="nav-link">文章</a></li>
            <li class="nav-item"><a href="{{ route('help') }}" class="nav-link">帮助</a></li>
            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">关于</a></li>
          </ul>
            <ul class="navbar-nav">
                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">登录</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">注册</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                          <a href="{{ route('users.show', Auth::user()->id) }}" class="dropdown-item">个人主页</a>

                          <a href="{{ route('posts.create') }}" class="dropdown-item">创建文章</a>

                          <a href="{{ route('logout') }}" class="dropdown-item"
                             onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              退出
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
