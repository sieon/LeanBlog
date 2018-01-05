@extends('layouts.app')
@section('title', $user->name . '的个人中心')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item"><a class="nav-link {{ active_class(if_query('tab', null)) }}" href="{{ route('users.show', $user->id) }}">Ta 的文章</a>
                        </li>
                        <li class="nav-item"><a class="nav-link {{ active_class(if_query('tab', 'comments')) }}" href="{{ route('users.show', [$user->id, 'tab' => 'comments']) }}">Ta 的评论</a>
                        </li>
                    </ul>
                </div>

                @if (if_query('tab', 'comments'))
                    @include('users._comments', ['comments' => $user->comments()->with('post')->recent()->paginate(5)])
                @else
                    @include('users._posts', ['posts' => $user->posts()->recent()->paginate(10)])
                @endif
            </div>
        </div>

        <div class="col-md-3">
            @include('users._user_info_card')
        </div>

    </div>
@endsection
