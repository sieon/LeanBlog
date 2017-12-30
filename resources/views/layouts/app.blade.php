@include('layouts.head')
<body>
<div id="app">
  @include('layouts.navbar')
  <div class="container">
    @yield('content')
  </div>
</div>
@include('layouts.footer')
