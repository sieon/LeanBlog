<div class="card">
    {{-- <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar card-img-top"/> --}}
    <img class="card-img-top" src="{{ $user->avatar }}">
    <div class="card-body">
        <h1 class="card-title h3">{{ $user->name }}</h1>
        <p class="card-text">{{ $user->introduction }}</p>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>注册于：</strong>{{ $user->created_at->diffForHumans() }}</li>
        <li class="list-group-item"><strong>最后活跃：</strong>{{ $user->last_actived_at->diffForHumans() }}</li>
    </ul>
</div>
