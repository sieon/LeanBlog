@extends('layouts.app')

@section('title')
我的通知
@stop

@section('content')
    <div class="col-md-10 ml-auto mr-auto">
        <div class="card">

            <h3 class="card-header text-center bg-transparent">
                <i class="fa fa-bell mr-2" aria-hidden="true"></i> 我的通知
            </h3>

            <div class="card-body">
                @if ($notifications->count())

                    <ul class="list-unstyled notification-list">
                        @foreach ($notifications as $notification)
                            @include('notifications.types._' . snake_case(class_basename($notification->type)))
                        @endforeach

                        {!! $notifications->render() !!}
                    </ul>

                @else
                    <div class="empty-block">没有消息通知！</div>
                @endif

            </div>

        </div>
    </div>
@stop
