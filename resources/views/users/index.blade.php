@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-4">
        @include('users._user-info')
      </div>
    </div>
  </div>
@endsection
