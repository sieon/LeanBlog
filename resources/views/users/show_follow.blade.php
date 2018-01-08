@extends('layouts.app')
@section('title', $title)

@section('content')

    <div class="page-header bg-light">
        <div class="container py-4">
            <nav class="text-left" aria-lable="breadcrumb">
                <ol class="breadcrumb bg-light small px-0">
                    <li class="breadcrumb-item"><a href="/">首页</a></li>
                    <li class="breadcrumb-item"><a href="#">个人中心</a></li>
                    <li class="breadcrumb-item active" aria-current="page">我的粉丝</li>
                </ol>
            </nav>
            @include('users._user_info')
        </div>
        <div class="container">
            @include('users._nav_tabs')
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card card-body border-0 bg-light">
                        <a class="media text-dark" href="{{ route('users.show', $user->id )}}">
                            <img class="rounded-circle mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="48" height="48" />
                            <div class="media-body">
                                <h3 class="h5">{{ $user->name }}</h3>
                                注册于：{{ $user->created_at->diffForHumans() }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
