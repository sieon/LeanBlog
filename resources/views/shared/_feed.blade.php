@if (count($feed_items))
<div class="row">
  @foreach ($feed_items as $post)
    <div class="col-md-4">
      @include('posts._entry', ['user' => $post->user])
    </div>
  @endforeach
</div>
<nav class="page-pagination mt-5">
  {!! $feed_items->links('vendor.pagination.bootstrap-4') !!}
</nav>
@endif
