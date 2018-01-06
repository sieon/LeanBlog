@if (count($active_users))
    <div class="card">
        <h3 class="card-header h5">
            活跃用户
        </h3>
        <div class="card-body">
            @foreach ($active_users as $active_user)
                <a class="media mb-3 text-secondary" href="{{ route('users.show', $active_user->id) }}">
                    <div class="avatar mr-2">
                        <img src="{{ $active_user->avatar }}" width="24px" height="24px" class="rounded-circle">
                    </div>

                    <div class="media-body">
                        <span class="media-heading">{{ $active_user->name }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif
