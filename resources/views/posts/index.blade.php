@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8">

            <div class="panel-heading my-3">
                <ul class="nav nav-pills">
                    <li role="presentation" class="nav-item"><a class="nav-link active" href="#">最新发布</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="#">最后回复</a></li>
                </ul>
            </div>

            @include('posts._entry')

        </div>

        <div class="col-md-4">
            @include('posts._sidebar')
        </div>

    </div>

@endsection