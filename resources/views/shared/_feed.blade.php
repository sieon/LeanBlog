@if (count($feed_items))
<div class="row">
  @foreach ($feed_items as $post)
    <div class="col-md-4">
      @include('posts._entry', ['user' => $post->user])
    </div>
  @endforeach
  {!! $feed_items->render() !!}
</div>
@endif
