<div class="card">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar card-img-top"/>
  <div class="card-body">
    <h1>{{ $user->name }}</h1>
    <p class="mt-4">个人简介：{{ $user->introduction }}</p>
    <p>邮箱：{{ $user->email }}</p>
    <p>注册时间：{{ $user->created_at->diffForHumans() }}</p>
  </div>
</div>