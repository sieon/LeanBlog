@extends('layouts.app')
@section('title', $user->name . '的个人中心')

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
            <div class="col-md-9">
                <div class="card">
                      @include('users._comments', ['comments' => $user->comments()->with('post')->recent()->paginate(5)])
                </div>
            </div>

        </div>
    </div>
@endsection
