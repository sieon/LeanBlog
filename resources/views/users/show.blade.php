@extends('layouts.app')
@section('title', '个人用户')

@section('content')
  <div class="row">
    <div class="col-md-4">
      @include('users._user_info')
    </div>
  </div>
  <div class="row mt-5">
    @if (count($posts) > 0)
      @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
          @include('posts._entry')
        </div>
      @endforeach
      {!! $posts->links() !!}
    @endif
  </div>
@endsection
