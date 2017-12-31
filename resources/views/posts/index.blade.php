@extends('layouts.app')

@section('content')

    <h1>
        <i class="fa fa-align-justify"></i> Post
        <a class="btn btn-success pull-right" href="{{ route('posts.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
    </h1>


    @if($posts->count())
        <div class="card-columns">
            @foreach($posts as $post)
                @include('posts._entry')
            @endforeach
        </div>
        {!! $posts->links('vendor.pagination.bootstrap-4') !!}

    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

@endsection