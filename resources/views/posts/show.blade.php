@extends('layouts.app')
@section('title', '首页')
@section('content')
<div class="row mt-5">
  <div class="col-md-8 offset-md-2">
      @include('posts._entry')
  </div>
</div>
@endsection
