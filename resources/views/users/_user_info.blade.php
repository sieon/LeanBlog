<div class="media">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar mr-3"/>
  <div class="media-body">
    <h3>{{ $user->name }}</h3>
    {{ $user->email }}
  </div>
</div>
