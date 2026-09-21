@extends('layouts.site')

@section('title', 'Terms of service')
@section('description', 'The terms for using the 3HDS Services website and working with us.')

@php($site = \App\Support\Site::data())

@section('content')
<div class="page-head">
  <div class="container">
    <a class="crumb" href="{{ url('/') }}">3HDS Services</a>
    <h1>Terms of service</h1>
    <p>Last updated 16 September 2026</p>
  </div>
</div>

<div class="page-body">
  <div class="container legal-wrap">
    <nav class="legal-links" aria-label="Legal documents">
      <a href="{{ route('privacy') }}" @if(request()->routeIs('privacy')) aria-current="page" @endif>Privacy policy</a>
      <a href="{{ route('terms') }}" @if(request()->routeIs('terms')) aria-current="page" @endif>Terms of service</a>
      <a href="{{ route('risk') }}" @if(request()->routeIs('risk')) aria-current="page" @endif>Risk disclosure</a>
    </nav>
    <article class="legal">

      <p class="legal-summary">These terms cover your use of this website and how we work with clients. Each project also has its own written quote or agreement, and where that document differs from these terms, the project document applies.</p>

      <h2>Information on this website</h2>
      <p>The content on this website is general information about our services. Starting prices are a guide, not an offer. Your price, scope and timeline are confirmed in a written quote before any work begins.</p>

      <h2>Quotes and changes</h2>
      <p>A quote sets out what we'll build, the price, the timeline and the payment schedule. Work starts once you accept the quote in writing. If you ask for changes outside the agreed scope, we'll explain how they affect the price and timeline before going ahead.</p>

      <h2>Payments</h2>
      <p>Payments are due as set out in your quote. If a payment is overdue, we may pause work until it's settled, and the timeline may move as a result.</p>

      <h2>Ownership of the work</h2>
      <p>Once your project is paid in full, you own the custom code and designs we create for it. Third-party components, such as open-source libraries, fonts, plugins and platform services, remain under their own licences. We may reuse our general know-how and tools that aren't specific to your project.</p>

      <h2>Your responsibilities</h2>
      <ul>
        <li>Give us accurate information, content and access when we need them.</li>
        <li>Make sure you have the right to use any text, images, logos or data you supply.</li>
        <li>Keep accounts held in your name, such as domains, hosting and app store accounts, active and renewed, unless a support plan covers this.</li>
      </ul>

      <h2>Third-party services</h2>
      <p>Our work often relies on services we don't control, such as hosting providers, app stores, payment providers, brokers and the MetaTrader platform. We aren't responsible for their outages, policy changes or price changes.</p>

      <h2>Trading software</h2>
      <p>Expert Advisors and other trading tools follow the rules and settings you choose. We don't provide investment advice and we don't guarantee trading results. Please read our <a href="{{ route('risk') }}">risk disclosure</a> before using any trading software.</p>

      <h2>Warranties and liability</h2>
      <p>We carry out our work with reasonable care and skill. Apart from what your project agreement says, and to the extent the law allows, the website and our software are provided without other warranties.</p>
      <p>To the extent the law allows, we aren't liable for indirect or consequential losses, lost profits, lost data or trading losses, and our total liability for a project is limited to the amount you paid us for that project.</p>
      <p>Nothing in these terms limits rights you have under consumer protection laws that can't be excluded, including the UK Consumer Rights Act 2015 and the Australian Consumer Law.</p>

      <h2>Using this website</h2>
      <p>Please don't misuse the website, including trying to break into it, disrupting it or sending spam through the contact form.</p>

      <h2>Governing law</h2>
      <p>Your project agreement states which country's laws apply to that project and where any dispute will be resolved.</p>

      <h2>Changes to these terms</h2>
      <p>We may update these terms from time to time. Changes don't affect projects already agreed in writing.</p>
    </article>
  </div>
</div>
@endsection
