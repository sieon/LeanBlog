@extends('layouts.app')
@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')

<div class="row">
  <div class="col-md-9">
    <h1>{{ $post->title }}</h1>
    <div class="post-meta my-3 text-muted">
      {{ $post->created_at->diffForHumans() }}
      ·
      <span class="fa fa-eye mr-2" aria-hidden="true"></span>
      {{ $post->view_count }}
    </div>
    <div class="post-content">
      {{ $post->content }}
    </div>

    @can('update', $post)
      <div class="operate">
        <hr>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm" role="button">
          <i class="fa fa-edit"></i> 编辑
        </a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-default btn-sm pull-left" style="margin-left: 6px">
                <i class="fa fa-trash"></i>
                删除
            </button>
        </form>
      </div>
    @endcan
  </div>

  <div class="col-md-3">
    <div class="card">
      <a href="{{ route('users.show', $post->user->id) }}">
        <img class="card-img-top" src="{{ $post->user->avatar }}">
      </a>
      <div class="card-body">
        <h3>{{ $post->user->name }}</h3>
        <p class="mt-4">个人简介：{{ $post->user->introduction }}</p>
        <p>邮箱：{{ $post->user->email }}</p>
        <p>注册时间：{{ $post->user->created_at->diffForHumans() }}</p>
      </div>
    </div>
  </div>

</div>

@endsection
