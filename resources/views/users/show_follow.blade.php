@extends('layouts.app')
@section('title', $title)

@section('content')

    <div class="page-header bg-white">
        <div class="container">
            <div class="py-5">
              <div class="d-flex justify-content-center mb-4">
                  <img class="rounded-circle" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="120" height="120">
              </div>
              <div class="text-center">
                <h4 class="media-heading">{{ $user->name }} </h4>
                <p class="media-heading">{{ $user->introduction }} </p>
                @include('users._follow_form')
              </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card card-body border-0">
                        <a class="media" href="{{ route('users.show', $user->id )}}">
                            <img class="rounded-circle mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="48" height="48" />
                            <div class="media-body">
                                {{ $user->name }}"
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
