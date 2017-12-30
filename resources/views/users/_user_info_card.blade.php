<div class="card">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar card-img-top"/>
  <div class="card-body">
    <h1>{{ $user->name }}</h1>
    <p class="mt-4">个人简介：Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
    <p>邮箱：{{ $user->email }}</p>
    <p>注册时间：{{ $user->created_at }}</p>
  </div>
</div>