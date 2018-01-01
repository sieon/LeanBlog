@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="card">

            <div class="card-header">
                <h1>
                    <i class="fa fa-edit"></i>
                    @if($post->id)
                        编辑 #{{$post->id}}
                    @else
                        创建文章
                    @endif
                </h1>
            </div>

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
                	<label for="content-field">内容</label>
                	<textarea name="content" id="editor" class="form-control" rows="3">{{ old('content', $post->content ) }}</textarea>
                </div>

                <div class="form-group">
                    <select class="form-control" name="category_id" required>
                        <option value="" hidden disabled selected>请选择分类</option>
                        @foreach ($categories as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">发表</button>
                        <a class="btn btn-link pull-right" href="{{ route('posts.index') }}"><i class="glyphicon glyphicon-backward"></i>  返回</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
    $(document).ready(function(){
        var editor = new Simditor({
            textarea: $('#editor'),
        });
    });
    </script>

@stop