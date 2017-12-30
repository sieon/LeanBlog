@extends('layouts.app')
@section('title', '首页')
@section('content')

  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  @include('shared._feed')

@endsection
