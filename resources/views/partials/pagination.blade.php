@if ($paginator->hasPages())
<nav class="pager" aria-label="Pages">
  @if ($paginator->onFirstPage())<span></span>@else<a href="{{ $paginator->previousPageUrl() }}" rel="prev">Newer</a>@endif
  <span>Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>
  @if ($paginator->hasMorePages())<a href="{{ $paginator->nextPageUrl() }}" rel="next">Older</a>@else<span></span>@endif
</nav>
@endif
