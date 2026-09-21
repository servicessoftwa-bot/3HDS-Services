<a class="post-card" href="{{ route('blog.show', $post) }}">
  <span class="post-date">{{ $post->published_at?->format('j F Y') }}</span>
  <h3>{{ $post->title }}</h3>
  @if($post->excerpt)<p>{{ \Illuminate\Support\Str::limit($post->excerpt, 180) }}</p>@endif
</a>
