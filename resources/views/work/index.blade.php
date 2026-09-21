@extends('layouts.site')

@section('title', 'Our work')
@section('description', 'Business software, web platforms, mobile apps and trading systems built by 3HDS Services.')

@section('content')
<div class="page-head">
  <div class="container">
    <a class="crumb" href="{{ url('/') }}">3HDS Services</a>
    <h1>Our work</h1>
    <p>Business software, web platforms, mobile apps and trading systems we've built for clients.</p>
  </div>
</div>

<div class="page-body">
  <div class="container">
    @if($projects->isEmpty())
      <p class="empty">Case studies are on their way. In the meantime, <a href="{{ url('/') }}#contact">tell us about your project</a>.</p>
    @else
      <div class="work-grid">
        @foreach($projects as $project)
          @include('partials.work-card', ['project' => $project])
        @endforeach
      </div>
      {{ $projects->links('partials.pagination') }}
    @endif
  </div>
</div>
@endsection
