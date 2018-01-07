@extends('layouts.app')
@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-body">

                <h1 class="card-title">{{ $post->title }}</h1>

                <div class="post-meta my-3 text-muted">
                    {{ $post->created_at->diffForHumans() }}
                    ·
                    <span class="fa fa-eye mr-2" aria-hidden="true"></span>
                    {{ $post->view_count }}
                    ·
                    <span class="fa fa-comments mr-2" aria-hidden="true"></span>
                    {{ $post->comment_count }}
                </div>

                <div class="post-content">
                    {!! $post->content !!}
                </div>

                @can('update', $post)
                    <hr>
                    <div class="operate d-flex justify-content-between">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-sm" role="button">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-secondary btn-sm" style="margin-left: 6px">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endcan

            </div>

            {{-- 用户回复列表 --}}
            <div class="card card-body mt-4">
                {{-- <h3 class="card-header">评论</h3> --}}
                @includeWhen(Auth::check(), 'posts._comment_box', ['post' => $post])
                @include('posts._comment_list', ['comments' => $post->comments()->with('user')->get()])
            </div>

        </div>

        <div class="col-md-3">

            <div class="card">

                <a href="{{ route('users.show', $post->user->id) }}">
                <img class="card-img-top" src="{{ $post->user->avatar }}">
                </a>

                <div class="card-body">
                    <h3 class="card-title">{{ $post->user->name }}</h3>
                    <p class="card-text">{{ $post->user->introduction }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>注册于：</strong>{{ $post->user->created_at->diffForHumans() }}</li>
                    <li class="list-group-item"><strong>最后活跃：</strong>{{ $post->user->last_actived_at->diffForHumans() }}</li>
                </ul>
            </div>

        </div>

    </div>
</div>

@endsection
