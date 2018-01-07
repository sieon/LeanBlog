@extends('layouts.app')
@section('title',  $post->id ? '编辑文章' : '发表文章')

@section('content')

<div class="container mt-4">
    <div class="card">
        <h1 class="h2 card-header bg-transparent">
            <i class="fa fa-edit"></i>
            @if($post->id)
                编辑 #{{$post->id}}
            @else
                创建文章
            @endif
        </h1>

        @include('common.error')

        <div class="card-body">
            @if($post->id)
                <form action="{{ route('posts.update', $post->id) }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
            @else
                <form action="{{ route('posts.store') }}" method="POST" accept-charset="UTF-8">
            @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="title-field">标题</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $post->title ) }}" />
                </div>

                <div class="form-group">
                    <select class="form-control" name="category_id" required>
                        <option value="" hidden disabled {{ $post->id ? '' : 'selected' }}>请选择分类</option>
                        @foreach ($categories as $value)
                            <option value="{{ $value->id }}" {{ $post->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                    </select>
                </div>

                <div id="editormd" class="form-group">
                    <textarea name="content" rows="10" style="display:none;" required>{{ old('content', $post->content ) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">  发表  </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editormd.min.css') }}">
@stop

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/editormd.min.js') }}"></script>

    {{--// Autoload modules mode, codemirror, marked... dependents libs path--}}
    <script>
    $(function() {
        var editor = editormd("editormd", {
            path : "../lib/",
            height : 640,
            saveHTMLToTextarea : true
        });

        /*
        // or
        var editor = editormd({
            id   : "editormd",
            path : "../lib/"
        });
        */
    });
    </script>

@stop
