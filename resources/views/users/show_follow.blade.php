@extends('layouts.app')
@section('title', $title)

@section('content')

  <div class="container mt-4">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  @include('users._nav_tabs')
                  <div class="card-body">
                      <div class="row">
                          @foreach ($users as $followUser)
                              <div class="col-md-4 mb-4">
                                  <a class="media text-dark" href="{{ route('users.show', $followUser->id )}}">
                                      <img class="rounded-circle mr-3" src="{{ $followUser->avatar }}" alt="{{ $followUser->name }}" width="48" height="48" />
                                      <h3 class="h6 py-2">{{ $followUser->name }}</h3>
                                  </a>
                              </div>
                          @endforeach
                      </div>

                  </div>
              </div>
          </div>
          <div class="col-md-3">
              @include('users._user_info')
          </div>
      </div>
  </div>


@endsection
