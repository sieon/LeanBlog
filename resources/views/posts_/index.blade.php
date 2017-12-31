@extends('layouts.app')
@section('title', '首页')
@section('content')
<div class="container">
  <div class="row mt-5">
    @if (count($posts) > 0)
      @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
          @include('posts._entry')
        </div>
      @endforeach
      {!! $posts->render() !!}
    @endif
  </div>
</div>
@endsection
