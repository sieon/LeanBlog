@extends('layouts.app')
@section('title', '个人用户')

@section('content')
  <div class="row">
    <div class="col-md-4">
      @include('users._user-info')
    </div>

  </div>
@endsection
