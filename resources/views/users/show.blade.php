@extends('layouts.app')
@section('title', $user->name . '的个人中心')

@section('content')
    <div class="row">

        <div class="col-md-3">
            @include('users._user_info_card')
        </div>

        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#">Ta 的文章</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ta 的评论</a></li>
                  </ul>
                </div>
                <div class="card-body">
                    @include('users._posts', ['posts' => $user->posts()->recent()->paginate(10)])
                </div>
            </div>

        </div>

    </div>
@endsection
