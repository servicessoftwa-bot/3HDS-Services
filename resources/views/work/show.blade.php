@extends('layouts.site')

@section('title', $project->title)
@section('description', \Illuminate\Support\Str::limit($project->description, 155))
@if($project->featured_image)
  @section('og_image', asset('storage/'.$project->featured_image))
@endif

@section('content')
<div class="page-head">
  <div class="container">
    <a class="crumb" href="{{ route('work.index') }}">Our work</a>
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
  </div>
</div>

<div class="page-body">
  <div class="container">
    @if($project->featured_image)
      <div class="feature-image"><img src="{{ asset('storage/'.$project->featured_image) }}" alt=""></div>
    @endif

    <div class="detail-grid">
      <div class="prose">{!! nl2br(e($project->content)) !!}</div>
      @if($project->client_name || !empty($project->technologies) || $project->project_url)
      <dl class="detail-side">
        @if($project->client_name)<div><dt>Client</dt><dd>{{ $project->client_name }}</dd></div>@endif
        @if(!empty($project->technologies))<div><dt>Built with</dt><dd>{{ implode(', ', $project->technologies) }}</dd></div>@endif
        @if($project->project_url)<div><dt>Live project</dt><dd><a href="{{ $project->project_url }}" target="_blank" rel="noopener">{{ parse_url($project->project_url, PHP_URL_HOST) ?: 'Visit' }}</a></dd></div>@endif
      </dl>
      @endif
    </div>

    @if($more->isNotEmpty())
      <div class="modes">
        <div class="modes-head"><h3>More of our work</h3></div>
        <div class="work-grid">
          @foreach($more as $other)
            @include('partials.work-card', ['project' => $other])
          @endforeach
        </div>
      </div>
    @endif
  </div>
</div>
@endsection
