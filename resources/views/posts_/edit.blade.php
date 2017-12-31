@extends('layouts.app')
@section('title', '编辑文章')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-md-8 offset-md-2">
      <form action="{{ route('posts.update', $post->id ) }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleFormControlSelect1">标题</label>
          <input type="text" class="form-control" name="title" value="{{ $post->title }}"></input>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">正文</label>
          <textarea class="form-control" rows="10" placeholder="正文" name="content" value="{{ $post->content }}">
            {{ $post->content }} {{ old('content') }}
          </textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">摘要</label>
          <textarea class="form-control" rows="5" placeholder="摘要" name="excerpt">
            {{ $post->excerpt }} {{ old('excerpt') }}
          </textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary pull-right">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
