@extends('layouts.app')

@section('title')
我的通知
@stop

@section('content')
  <div class="col-md-10 ml-auto mr-auto">
      <div class="card">

          <div class="card-body">

              <h3 class="card-title text-center">
                  <i class="fa fa-bell mr-2" aria-hidden="true"></i> 我的通知
              </h3>

              <hr>

              @if ($notifications->count())

                  <div class="notification-list">
                      @foreach ($notifications as $notification)
                          @include('notifications.types._' . snake_case(class_basename($notification->type)))
                      @endforeach

                      {!! $notifications->render() !!}
                  </div>

              @else
                  <div class="empty-block">没有消息通知！</div>
              @endif

          </div>
      </div>
  </div>
@stop
