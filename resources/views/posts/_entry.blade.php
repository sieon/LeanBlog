<div id="post-{{ $post->id }}" class="card">
  <div class="card-body">
    <a class="text-dark" href="{{ route('posts.show', $post->id ) }}">
      <h3 class="card-title">{{ $post->title }}</h3>
    </a>
    <p class="post-on">
      <span class="user">
        {{-- <a href="{{ route('users.show', Auth::user()->id) }}">{{ $user->name }}</a> --}}
      </span>
      <span>{{ $post->created_at->diffForHumans() }}</span>
    </p>
    <p class="post-excerpt">{{ $post->excerpt }}</p>
    <p><a class="btn btn-secondary" href="{{ route('posts.show', $post->id )}}">阅读全文</a></p>
  </div>
</div>