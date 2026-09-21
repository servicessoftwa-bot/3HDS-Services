@extends('layouts.site')

@section('title', 'Page not found')

@push('head')<meta name="robots" content="noindex">@endpush

@section('content')
<div class="page-head">
  <div class="container">
    <h1>This page doesn't exist.</h1>
    <p>The link may be broken, or the page may have moved. Everything about 3HDS Services is on the homepage.</p>
    <div class="actions">
      <a class="btn btn-light" href="{{ url('/') }}">Go to the homepage</a>
      <a class="btn btn-ghost" href="{{ url('/') }}#contact">Contact us</a>
    </div>
  </div>
</div>
@endsection
