@include('layouts._head')

  @include('layouts._navbar')

  <div class="container">

      @include('layouts._message')
      @yield('content')

  </div>

@include('layouts._footer')