<div id="post-{{ $post->id }}" class="card">
  <div class="card-body">
    <a href="{{ route('posts.show', $post->id ) }}">
      <h3 class="card-title">{{ $post->title }}</h3>
    </a>
    <p>
      <span class="user">
        <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a>
      </span>
      <span>{{ $post->created_at->diffForHumans() }}</span>
    </p>
    <p>{{ $post->excerpt }}</p>
    <p><a class="btn btn-secondary" href="{{ route('posts.show', $post->id )}}">阅读全文</a></p>
  </div>
</div>
