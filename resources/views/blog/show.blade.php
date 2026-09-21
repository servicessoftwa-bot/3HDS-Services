@extends('layouts.site')

@section('title', $post->meta_title ?: $post->title)
@section('description', $post->meta_description ?: \Illuminate\Support\Str::limit($post->excerpt ?: strip_tags($post->content), 155))
@if($post->featured_image)
  @section('og_image', asset('storage/'.$post->featured_image))
@endif

@section('content')
<div class="page-head">
  <div class="container">
    <a class="crumb" href="{{ route('blog.index') }}">Blog</a>
    <h1>{{ $post->title }}</h1>
    <div class="page-meta"><span>{{ $post->published_at?->format('j F Y') }}</span></div>
  </div>
</div>

<div class="page-body">
  <div class="container narrow">
    @if($post->featured_image)
      <div class="feature-image"><img src="{{ asset('storage/'.$post->featured_image) }}" alt=""></div>
    @endif
    <div class="prose">{!! nl2br(e($post->content)) !!}</div>
    <p class="section-more"><a class="btn btn-primary" href="{{ url('/') }}#contact">Talk to us about a project</a></p>
  </div>
</div>
@endsection
