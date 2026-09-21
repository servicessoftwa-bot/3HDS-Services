@extends('layouts.site')

@section('title', 'Trading software risk disclosure')
@section('description', 'The risks of using trading software such as MetaTrader 5 Expert Advisors.')

@php($site = \App\Support\Site::data())

@section('content')
<div class="page-head">
  <div class="container">
    <a class="crumb" href="{{ url('/') }}">3HDS Services</a>
    <h1>Trading software risk disclosure</h1>
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

      <p class="legal-summary legal-summary--risk">Trading gold, currencies and other leveraged products carries a high risk of loss and isn't suitable for everyone. You can lose some or all of your money, and with some brokers and account types you can lose more than you deposit. Only trade with money you can afford to lose.</p>

      <h2>What 3HDS does and doesn't do</h2>
      <p>3HDS is a software developer. We code, test and set up trading software, such as MetaTrader 5 Expert Advisors and indicators, based on rules and settings you provide.</p>
      <p>We are not a broker or a financial adviser, and we are not authorised by the Financial Conduct Authority in the UK, the Australian Securities and Investments Commission or the Securities and Exchange Commission of Pakistan to give financial advice. We don't recommend strategies, manage trading accounts for clients or hold client money.</p>

      <h2>No guaranteed results</h2>
      <p>No trading software can guarantee profits or protect you from losses. Coding a strategy accurately doesn't make it profitable, and we don't assess whether your strategy will make money.</p>

      <h2>Backtests and past performance</h2>
      <p>Backtests, optimisation results and past performance don't reliably predict future results. Tests use historical data and assumptions that can differ from live trading, and strategies tuned too closely to past data often perform worse in real markets.</p>

      <h2>Live trading risks</h2>
      <ul>
        <li>Spreads, commissions, slippage and execution speed vary between brokers and change with market conditions, especially around major news.</li>
        <li>Brokers can change leverage, margin requirements, trading hours and contract specifications.</li>
        <li>Internet, VPS or power outages, platform updates and software bugs can stop an Expert Advisor from working as expected.</li>
        <li>Risk controls such as stop losses and daily loss limits reduce risk but can't remove it, and orders can fill at worse prices than requested.</li>
      </ul>

      <h2>Your responsibilities</h2>
      <ul>
        <li>Test any Expert Advisor on a demo account before using real money.</li>
        <li>Choose your own settings, lot sizes and risk levels, and monitor your account regularly.</li>
        <li>Make sure you understand leverage and your broker's terms.</li>
        <li>Get independent financial advice if you're unsure whether trading is right for you.</li>
      </ul>

      <h2>Questions</h2>
      <p>If anything here is unclear, @if($site['email'])email <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>@else contact us through the <a href="{{ url('/') }}#contact">contact form</a>@endif before you buy or use any trading software from us.</p>
    </article>
  </div>
</div>
@endsection
