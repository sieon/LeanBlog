@extends('layouts.app')
@section('title', '首页')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-md-8 offset-md-2">
      <form action="{{ route('posts.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="title" value="">{{ old('title') }}</input>
        <textarea class="form-control" rows="10" placeholder="摘要" name="excerpt">{{ old('content') }}</textarea>
        <textarea class="form-control" rows="10" placeholder="正文" name="content">{{ old('content') }}</textarea>
        <button type="submit" class="btn btn-primary pull-right">发布</button>
      </form>
    </div>
  </div>
</div>
@endsection
