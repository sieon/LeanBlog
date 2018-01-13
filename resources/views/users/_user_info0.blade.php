<div class="card">
    <div class="card-body" style="">
        <div class="media">
            <img class="avatar rounded-circle mr-3" src="{{ $user->avatar }}" width="120" height="120">
            <div class="media-body">
                <h1 class="card-title h4">{{ $user->name }}</h1>
                <p class="card-text">{{ $user->introduction }}</p>
            </div>
        </div>
        <hr>
        @include('users._stats')
        <hr>
        @if (Auth::check())
            @include('users._follow_form')
        @endif
    </div>

    {{-- <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>注册于：</strong>{{ $user->created_at->diffForHumans() }}</li>
        <li class="list-group-item"><strong>最后活跃：</strong>{{ $user->last_actived_at->diffForHumans() }}</li>
    </ul> --}}
</div>
