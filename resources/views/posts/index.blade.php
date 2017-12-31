@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')

    <div class="row">
        <div class="col-md-8">

            @if (isset($category))
                <div class="alert alert-info" role="alert">
                    {{ $category->name }} ：{{ $category->description }}
                </div>
            @endif

            <div class="panel-heading my-3">
                <ul class="nav nav-pills">
                    <li role="presentation" class="nav-item"><a class="nav-link {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">最新发布</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link {{ active_class(( ! if_query('order', 'recent') )) }}" href="{{ Request::url() }}?order=default">最后回复</a></li>
                </ul>
            </div>

            @include('posts._entry')

        </div>

        <div class="col-md-4">
            @include('posts._sidebar')
        </div>

    </div>

@endsection