@extends('layouts.app')
@section('title', $user->name . '的个人中心')

@section('content')
    <div class="row">

        <div class="col-md-3">
            @include('users._user_info_card')
        </div>

        <div class="col-md-9">
            <div class="row">
            @if (count($posts) > 0)
              @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                  @include('posts._entry')
                </div>
              @endforeach
            @endif
            </div>
            <nav class="page-pagination mt-3">
            {!! $posts->links('vendor.pagination.bootstrap-4') !!}
            </nav>
        </div>

    </div>
@endsection