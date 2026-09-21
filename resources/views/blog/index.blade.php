@extends('layouts.site')

@section('title', 'Blog')
@section('description', 'Notes from 3HDS Services on business software, web and mobile apps, and trading systems.')

@section('content')
<div class="page-head">
  <div class="container">
    <a class="crumb" href="{{ url('/') }}">3HDS Services</a>
    <h1>Blog</h1>
    <p>Notes on building business software, web and mobile apps, and trading systems.</p>
  </div>
</div>

<div class="page-body">
  <div class="container">
    @if($posts->isEmpty())
      <p class="empty">No posts yet. Check back soon.</p>
    @else
      <div class="post-grid">
        @foreach($posts as $post)
          @include('partials.post-card', ['post' => $post])
        @endforeach
      </div>
      {{ $posts->links('partials.pagination') }}
    @endif
  </div>
</div>
@endsection
