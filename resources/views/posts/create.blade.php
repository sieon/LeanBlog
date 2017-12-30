@extends('layouts.app')
@section('title', '首页')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-md-8 offset-md-2">
      <form action="{{ route('posts.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleFormControlSelect1">标题</label>
          <input type="text" class="form-control" name="title" value="">{{ old('title') }}</input>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">正文</label>
          <textarea class="form-control" rows="10" placeholder="正文" name="content">{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">摘要</label>
          <textarea class="form-control" rows="5" placeholder="摘要" name="excerpt">{{ old('excerpt') }}</textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary pull-right">发布</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
