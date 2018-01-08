@extends('layouts.app')
@section('title', $user->name . '发表过的评论')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @include('users._nav_tabs')
                    @include('users._comments', ['comments' => $user->comments()->with('post')->recent()->paginate(10)])
                </div>
            </div>
            <div class="col-md-3">
                @include('users._user_info_card')
            </div>
        </div>
    </div>
@endsection
