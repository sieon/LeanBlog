@extends('layouts.app')
@section('title', '首页')
@section('content')
<div class="row mt-5">
  <div class="col-md-8 offset-md-2">
    <div id="post-{{ $post->id }}" class="post">
      <h1 class="post-title">{{ $post->title }}</h1>
      <div class="post-on text-muted my-3">
        <span class="user">
          <i class="fa fa-user"></i>
          <a href="{{ route('users.show', Auth::user()->id) }}">{{ $user->name }}</a>
        </span>
        <span>{{ $post->created_at->diffForHumans() }}</span>
      </div>
      <div class="post-content">
        {{ $post->content }}
      </div>

      <p>
        <span><a href="{{ route('posts.edit', $post->id) }}"></a></span>
      </p>
    </div>
  </div>
</div>
@endsection
