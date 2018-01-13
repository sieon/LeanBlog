@extends('layouts.app')
@section('title', '首页')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            @include('shared._feed')
        </div>
        <div class="col-md-3">
            @include('posts._sidebar')
        </div>
    </div>
</div>

@endsection
