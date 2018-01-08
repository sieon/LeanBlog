<div class="media">
    <div class="avatar mr-3">
        <img class="rounded" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="90" height="90">
    </div>
    <div class="media-body">
        <h3 class="mb-3">{{ $user->name }} </h3>
        <p>{{ $user->introduction }}</p>

    </div>@include('users._follow_form')
</div>
