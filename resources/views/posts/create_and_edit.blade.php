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

                <div class="form-group">
                    <script id="container" name="content" type="text/plain" required>
                        {!! old('content', $post->content ) !!}
                    </script>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">发表</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('styles')
    @include('UEditor::head')
@stop

@section('scripts')
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            toolbars: [
                [
                    'paragraph', //段落格式
                    'bold', //加粗
                    'italic', //斜体
                    'insertorderedlist', //有序列表
                    'insertunorderedlist', //无序列表
                    'blockquote', //引用
                    'justifyleft', //居左对齐
                    'justifyright', //居右对齐
                    'justifycenter', //居中对齐
                    'justifyjustify', //两端对齐
                    'link', //超链接
                    'unlink', //取消链接
                    'insertcode', //代码语言
                    'fullscreen', //全屏
                ],
                [
                    'underline', //下划线
                    'strikethrough', //删除线
                    'horizontal', //分隔线
                    'removeformat', //清除格式
                    'simpleupload', //单图上传
                    'insertimage', //多图上传
                    'imagenone', //默认
                    'imageleft', //左浮动
                    'imageright', //右浮动
                    'imagecenter', //居中
                    'wordimage', //图片转存
                    'insertvideo', //视频
                    'inserttable', //插入表
                    'undo', //撤销
                    'redo', //重做
                ]
            ],
            autoHeightEnabled: true,
            autoFloatEnabled: true
        });
            ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@stop
