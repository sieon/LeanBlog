@extends('layouts.app')
@section('title', $title)

@section('content')

  <div class="container mt-4">
      <div class="row">
          <div class="col-md-8">
              <div class="card">
                  @include('users._nav_tabs')
                  <div class="card-body">
                      <div class="row">
                          @foreach ($users as $user)
                              <div class="col-md-4 mb-4">
                                  <a class="media text-dark" href="{{ route('users.show', $user->id )}}">
                                      <img class="rounded-circle mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="48" height="48" />
                                      <h3 class="h6 py-2">{{ $user->name }}</h3>
                                  </a>
                              </div>
                          @endforeach
                      </div>

                  </div>
              </div>
          </div>
          <div class="col-md-3">
              @include('users._user_info_card')
          </div>
      </div>
  </div>


@endsection
