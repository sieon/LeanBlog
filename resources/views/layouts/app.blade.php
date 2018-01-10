<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LeanBlog') - LeanBlog</title>
    <meta name="description" content="@yield('description', setting('seo_description', 'LeanBlog博客系统。'))" />
    <meta name="keyword" content="@yield('keyword', setting('seo_keyword', 'WordPress主题,Laravel开发,leanblog,博客系统'))" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('UEditor::head')
    @yield('styles')
</head>
<body>
    <div id="app" class="{{ route_class() }}-page bg-white">
        @include('layouts._header')

            @include('layouts._message')

            @yield('content')

        @include('layouts._footer')

    </div>

    @if (app()->isLocal())
        @include('sudosu::user-selector')
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
