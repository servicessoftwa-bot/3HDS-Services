<a class="work-card" href="{{ route('work.show', $project) }}">
  <div class="work-thumb">
    @if($project->featured_image)
      <img src="{{ asset('storage/'.$project->featured_image) }}" alt="" loading="lazy">
    @else
      <span aria-hidden="true">{{ mb_strtoupper(mb_substr($project->title, 0, 1)) }}</span>
    @endif
  </div>
  <div class="work-info">
    @if($project->client_name)<span class="work-client">{{ $project->client_name }}</span>@endif
    <h3>{{ $project->title }}</h3>
    <p>{{ \Illuminate\Support\Str::limit($project->description, 160) }}</p>
    @if(!empty($project->technologies))
      <div class="tags">@foreach(array_slice($project->technologies, 0, 4) as $tech)<span>{{ $tech }}</span>@endforeach</div>
    @endif
  </div>
</a>
