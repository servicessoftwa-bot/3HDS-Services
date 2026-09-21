<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@php
    $defaultTitle = '3HDS Services | Business software, apps and trading systems';
    $pageTitle = $__env->hasSection('title') ? trim($__env->yieldContent('title')).' | 3HDS Services' : $defaultTitle;
    $pageDescription = $__env->hasSection('description') ? trim($__env->yieldContent('description')) : 'Custom business software that works online and offline, plus web platforms, mobile apps and MetaTrader 5 trading systems, from 3HDS Services.';
    $pageImage = $__env->hasSection('og_image') ? trim($__env->yieldContent('og_image')) : asset('og-image.png');
    $h = request()->routeIs('home') ? '' : url('/');
@endphp
<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="theme-color" content="#2F3CF4">
<link rel="canonical" href="{{ url()->current() }}">
<link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="3HDS Services">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $pageImage }}">
<meta name="twitter:card" content="summary_large_image">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@62..125,100..900&display=swap">
<link rel="stylesheet" href="{{ asset('css/site.css') }}?v={{ filemtime(public_path('css/site.css')) }}">
@stack('head')
</head>
<body id="top">
<a class="skip" href="#main">Skip to content</a>

<header class="site-header">
  <div class="container header-inner">
    <a class="brand" href="{{ $h ?: '#top' }}" aria-label="3HDS Services home">
      @if($site['logo'])<img class="brand-logo" src="{{ asset('storage/'.$site['logo']) }}" alt="">@else<svg class="brand-mark" viewBox="0 0 28 28" fill="currentColor" aria-hidden="true"><rect x="3" y="3" width="22" height="5.5" rx="2.75"/><rect x="10" y="11.25" width="15" height="5.5" rx="2.75"/><rect x="3" y="19.5" width="22" height="5.5" rx="2.75"/></svg>@endif
      <span class="brand-name">3HDS</span><span class="brand-sub">Services</span>
    </a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav"><span class="sr-only">Menu</span><span class="menu-icon" aria-hidden="true"></span></button>
    <nav id="site-nav" class="nav" aria-label="Main">
      <a href="{{ $h }}#services">Services</a>
      @if($navHasWork)<a href="{{ route('work.index') }}" @if(request()->routeIs('work.*')) aria-current="page" @endif>Work</a>@endif
      <a href="{{ $h }}#pricing">Pricing</a>
      <a href="{{ $h }}#trading">Trading systems</a>
      @if($navHasBlog)<a href="{{ route('blog.index') }}" @if(request()->routeIs('blog.*')) aria-current="page" @endif>Blog</a>@endif
      <a href="{{ $h }}#faq">FAQ</a>
      <a class="btn btn-primary btn-sm" href="{{ $h }}#contact">Start a project</a>
    </nav>
  </div>
</header>

<main id="main" tabindex="-1">
@yield('content')
</main>

<footer class="site-footer">
  <div class="container footer-inner">
    <div class="footer-brand">
      <a class="brand" href="{{ $h ?: '#top' }}" aria-label="3HDS Services home">
        @if($site['logo'])<img class="brand-logo" src="{{ asset('storage/'.$site['logo']) }}" alt="">@else<svg class="brand-mark" viewBox="0 0 28 28" fill="currentColor" aria-hidden="true"><rect x="3" y="3" width="22" height="5.5" rx="2.75"/><rect x="10" y="11.25" width="15" height="5.5" rx="2.75"/><rect x="3" y="19.5" width="22" height="5.5" rx="2.75"/></svg>@endif
        <span class="brand-name">3HDS</span><span class="brand-sub">Services</span>
      </a>
      <p>Business software, web platforms, mobile apps and trading systems for clients in the United Kingdom, Australia and Pakistan.</p>
    </div>
    <nav class="footer-nav" aria-label="Footer">
      <a href="{{ $h }}#services">Services</a>
      <a href="{{ $h }}#process">Process</a>
      <a href="{{ $h }}#pricing">Pricing</a>
      <a href="{{ $h }}#trading">Trading systems</a>
      @if($navHasWork)<a href="{{ route('work.index') }}">Work</a>@endif
      @if($navHasBlog)<a href="{{ route('blog.index') }}">Blog</a>@endif
      <a href="{{ $h }}#team">Team</a>
      <a href="{{ $h }}#faq">FAQ</a>
      <a href="{{ $h }}#contact">Contact</a>
    </nav>
  </div>
  <div class="container">
    @if($site['social'] || $site['company_line'])
    <div class="footer-extra">
      @if($site['social'])
      <nav class="footer-social" aria-label="Social media">
        @foreach($site['social'] as $link)<a href="{{ $link['url'] }}" target="_blank" rel="noopener">{{ $link['label'] }}</a>@endforeach
      </nav>
      @endif
      @if($site['company_line'])<p class="footer-company">{{ $site['company_line'] }}</p>@endif
    </div>
    @endif
    <div class="footer-base">
      <p>© {{ date('Y') }} 3HDS Services</p>
      <nav class="footer-legal" aria-label="Legal">
        <a href="{{ route('privacy') }}">Privacy policy</a>
        <a href="{{ route('terms') }}">Terms of service</a>
        <a href="{{ route('risk') }}">Risk disclosure</a>
      </nav>
      @if($site['email'])<a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>@endif
    </div>
  </div>
</footer>

@if($site['whatsapp'])
<a class="wa-float" href="https://wa.me/{{ $site['whatsapp'] }}?text={{ rawurlencode("Hi 3HDS, I'd like to talk about a project.") }}" target="_blank" rel="noopener">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.5 11.5a8.5 8.5 0 0 1-12.4 7.6L3 20.5l1.5-4.9A8.5 8.5 0 1 1 20.5 11.5z"/></svg>
  <span>Chat on WhatsApp</span>
</a>
@endif

@stack('scripts')
<script src="{{ asset('js/site.js') }}?v={{ filemtime(public_path('js/site.js')) }}" defer></script>
@if($site['analytics_token'])
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"token": "{{ $site['analytics_token'] }}"}'></script>
@endif
</body>
</html>
