@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')

    <div class="app-content">

        <div class="row">
            <div class="col-md-8">

                @if (isset($category))
                    <div class="card mb-4">
                        <div class="card-body">
                            <h1 class="card-title">{{ $category->name }}</h1>
                            <p class="lead mb-0">{{ $category->description }}</p>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header bg-transparent">
                        <ul class="nav nav-pills card-header-pills">
                            <li role="presentation" class="nav-item"><a class="nav-link {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">最新发布</a></li>
                            <li role="presentation" class="nav-item"><a class="nav-link {{ active_class(( ! if_query('order', 'recent') )) }}" href="{{ Request::url() }}?order=default">最后回复</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        @include('posts._entry')
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                @include('posts._sidebar')
            </div>

        </div>
    </div>

@endsection
