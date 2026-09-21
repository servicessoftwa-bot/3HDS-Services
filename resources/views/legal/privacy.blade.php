@extends('layouts.site')

@section('title', 'Privacy policy')
@section('description', 'How 3HDS Services collects, uses and protects personal information.')

@php($site = \App\Support\Site::data())

@section('content')
<div class="page-head">
  <div class="container">
    <a class="crumb" href="{{ url('/') }}">3HDS Services</a>
    <h1>Privacy policy</h1>
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

      <p class="legal-summary">We only collect what we need to reply to you and deliver your project. We don't sell your information, and this website doesn't use advertising or tracking cookies.</p>

      <h2>Who we are</h2>
      <p>3HDS Services ("3HDS", "we", "us") designs and builds business software, websites, web platforms, mobile apps and trading software for clients in the United Kingdom, Australia and Pakistan. You can contact us about this policy @if($site['email'])at <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>@else through the <a href="{{ url('/') }}#contact">contact form</a>@endif.</p>

      <h2>Information we collect</h2>
      <ul>
        <li>When you contact us: your name, email address and anything you choose to tell us about your project, whether through the contact form, email, phone or WhatsApp.</li>
        <li>When you become a client: the information needed to deliver the work, such as business and billing details, and access to accounts or systems you give us.</li>
        <li>When you visit the website: technical information your browser sends automatically, such as your IP address and browser type, which is handled by our website host and the services described below.</li>
      </ul>

      <h2>How we use it</h2>
      <p>We use your information to reply to enquiries, prepare quotes, deliver and support projects, send invoices, keep the records the law requires, and protect the website from spam and abuse. We don't sell your information or use it for unrelated marketing.</p>

      <h2>Legal basis for UK and EU visitors</h2>
      <p>Under UK GDPR we rely on taking steps at your request before entering into a contract, performing our contract with you, our legitimate interest in running our business, and complying with legal obligations such as keeping tax records. Where we ask for your consent, you can withdraw it at any time.</p>

      <h2>Who we share it with</h2>
      <p>We share information only when needed, with:</p>
      <ul>
        <li>service providers that run parts of our business, such as website hosting, email and messaging apps</li>
        <li>professional advisers such as accountants and lawyers</li>
        <li>authorities, when the law requires it</li>
      </ul>

      <h2>International transfers</h2>
      <p>Our team works from Australia, the United Kingdom and Pakistan, and some service providers store data in other countries, including the United States. When information moves between countries, we take reasonable steps to keep it protected, including choosing providers that offer recognised safeguards.</p>

      <h2>How long we keep it</h2>
      <p>We keep enquiries only for as long as we need them to reply and follow up. Client and invoice records are kept for as long as tax and accounting laws require.</p>

      <h2>Cookies, local storage and fonts</h2>
      <p>This website doesn't use advertising or tracking cookies. When you choose a country in the pricing section, your browser remembers that choice in local storage on your device, and it isn't sent to us. The page loads its typeface from Google Fonts, so Google receives your IP address when the page loads. We may also use Cloudflare Web Analytics, which counts visits without cookies and without tracking you across other websites.@if(config('services.recaptcha.site_key')) The contact form uses Google reCAPTCHA to block spam, which shares information about your device and browser with Google.@endif</p>

      <h2>Your rights</h2>
      <p>Depending on where you live, you can ask to access, correct or delete your information, object to or restrict how we use it, or receive a copy in a portable format. Email us and we'll respond within the time the law requires.</p>
      <p>If you're unhappy with how we handle your information, please contact us first. You can also complain to the Information Commissioner's Office in the UK (<a href="https://ico.org.uk" target="_blank" rel="noopener">ico.org.uk</a>) or, where the Australian Privacy Act applies to us, the Office of the Australian Information Commissioner (<a href="https://www.oaic.gov.au" target="_blank" rel="noopener">oaic.gov.au</a>).</p>

      <h2>Security</h2>
      <p>We use reasonable measures to protect your information, including access controls and encrypted connections. No method of sending or storing data online is completely secure, so we can't guarantee absolute security.</p>

      <h2>Children</h2>
      <p>Our services are for businesses and adults. We don't knowingly collect information from children.</p>

      <h2>Changes to this policy</h2>
      <p>We may update this policy from time to time. The date at the top shows when it last changed.</p>
    </article>
  </div>
</div>
@endsection
