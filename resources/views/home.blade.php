@extends('layouts.site')

@push('head')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => '3HDS Services',
    'url' => url('/'),
    'logo' => asset('apple-touch-icon.png'),
    'description' => 'Custom business software for online and offline use, web platforms, mobile apps and MetaTrader 5 trading systems.',
    'areaServed' => ['GB', 'AU', 'PK'],
    'email' => $site['email'] ?: null,
    'employee' => $team->map(fn ($m) => ['@type' => 'Person', 'name' => $m->name, 'jobTitle' => $m->role])->values()->all(),
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_HEX_TAG) !!}
</script>
@endpush

@section('content')
<script type="application/json" id="site-data">{!! json_encode(['pricing' => $site['pricing'], 'defaultRegion' => config('site.default_region')], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
  <!-- Hero -->
  <section class="hero" aria-labelledby="hero-title">
    <div class="container hero-grid">
      <div class="hero-copy">
        <h1 id="hero-title">Software your business can run on.</h1>
        <p class="lede">3HDS Services builds business software of every kind, online and offline, along with web platforms, mobile apps and MetaTrader trading systems. Then we keep it secure and running after launch.</p>
        <div class="actions">
          <a class="btn btn-light" href="#contact">Start a project</a>
          <a class="btn btn-ghost" href="#services">See what we build</a>
        </div>
      </div>

      <div class="console">
        <div class="console-bar">
          <div class="tabs" role="tablist" aria-label="Examples of what we build">
            <button class="tab" type="button" role="tab" id="tab-biz" aria-controls="panel-biz" aria-selected="true">Business<span class="tab-more"> software</span></button>
            <button class="tab" type="button" role="tab" id="tab-web" aria-controls="panel-web" aria-selected="false" tabindex="-1">Web<span class="tab-more"> platform</span></button>
            <button class="tab" type="button" role="tab" id="tab-mobile" aria-controls="panel-mobile" aria-selected="false" tabindex="-1">Mobile<span class="tab-more"> app</span></button>
            <button class="tab" type="button" role="tab" id="tab-trade" aria-controls="panel-trade" aria-selected="false" tabindex="-1">Trading<span class="tab-more"> system</span></button>
          </div>
        </div>

        <!-- Business software example -->
        <div class="panel panel-biz" role="tabpanel" id="panel-biz" aria-labelledby="tab-biz" tabindex="0">
          <div class="panel-body">
            <div class="pos" aria-hidden="true">
              <div class="pos-main">
                <div class="pos-top">
                  <p class="app-title">New sale</p>
                  <span class="sync-pill"><i></i>Offline, 3 sales will sync</span>
                </div>
                <div class="pos-cats"><span class="is-active">All</span><span>Drinks</span><span>Bakery</span><span>Meals</span></div>
                <div class="pos-grid">
                  <span class="is-added"><b>Latte</b><em>3.40</em></span>
                  <span><b>Mocha</b><em>3.20</em></span>
                  <span class="is-added"><b>Wrap</b><em>6.50</em></span>
                  <span class="is-added"><b>Brownie</b><em>2.90</em></span>
                  <span><b>Muffin</b><em>2.80</em></span>
                  <span><b>Soup</b><em>5.20</em></span>
                  <span><b>Juice</b><em>3.10</em></span>
                  <span><b>Tea</b><em>2.40</em></span>
                </div>
              </div>
              <div class="pos-ticket">
                <p class="pos-ticket-title">Order 1042</p>
                <ul>
                  <li><span>2 × Latte</span><span>6.80</span></li>
                  <li><span>1 × Wrap</span><span>6.50</span></li>
                  <li><span>1 × Brownie</span><span>2.90</span></li>
                </ul>
                <div class="pos-total"><span>Total</span><strong>£16.20</strong></div>
                <span class="pos-pay">Take payment</span>
                <p class="pos-note">Receipt prints and stock updates on the device, even without internet</p>
              </div>
            </div>
          </div>
          <p class="panel-caption">Example: point of sale that keeps working offline and syncs to the cloud</p>
        </div>

        <!-- Web platform example -->
        <div class="panel panel-web" role="tabpanel" id="panel-web" aria-labelledby="tab-web" tabindex="0" hidden>
          <div class="panel-body">
            <div class="app" aria-hidden="true">
              <div class="app-nav">
                <span class="app-brand">Workshop</span>
                <span class="is-active">Jobs</span>
                <span>Bookings</span>
                <span>Customers</span>
                <span>Invoices</span>
              </div>
              <div class="app-main">
                <div class="app-top">
                  <div>
                    <p class="app-title">Jobs this week</p>
                    <p class="app-sub">32 booked, 5 in the workshop now</p>
                  </div>
                  <span class="app-btn">New job</span>
                </div>
                <div class="app-chart">
                  <div class="bar" style="--h:40%;--d:0"><i></i><span>Mon</span></div>
                  <div class="bar" style="--h:56%;--d:1"><i></i><span>Tue</span></div>
                  <div class="bar" style="--h:46%;--d:2"><i></i><span>Wed</span></div>
                  <div class="bar" style="--h:68%;--d:3"><i></i><span>Thu</span></div>
                  <div class="bar is-today" style="--h:76%;--d:4"><i></i><span>Fri</span></div>
                  <div class="bar" style="--h:30%;--d:5"><i></i><span>Sat</span></div>
                  <div class="bar" style="--h:12%;--d:6"><i></i><span>Sun</span></div>
                </div>
                <ul class="app-rows">
                  <li><span class="car">Honda Civic</span><span class="task">Front bumper respray</span><span class="status s-progress">In progress</span></li>
                  <li><span class="car">Toyota Corolla</span><span class="task">Windscreen replacement</span><span class="status s-parts">Awaiting parts</span></li>
                  <li><span class="car">Suzuki Swift</span><span class="task">Door panel repair</span><span class="status s-ready">Ready to collect</span></li>
                  <li><span class="car">Kia Sportage</span><span class="task">Full service and alignment</span><span class="status s-booked">Booked in</span></li>
                </ul>
              </div>
            </div>
          </div>
          <p class="panel-caption">Example: job tracking system for a vehicle repair workshop</p>
        </div>

        <!-- Mobile app example -->
        <div class="panel panel-mobile" role="tabpanel" id="panel-mobile" aria-labelledby="tab-mobile" tabindex="0" hidden>
          <div class="panel-body">
            <div class="phone" aria-hidden="true">
              <div class="phone-screen">
                <p class="ph-loc">Deliver to Home</p>
                <p class="ph-title">What do you need today?</p>
                <div class="ph-grid">
                  <span><b style="--c:#FFC53D"></b>Food</span>
                  <span><b style="--c:#34C38F"></b>Grocery</span>
                  <span><b style="--c:#2F3CF4"></b>Home repair</span>
                  <span><b style="--c:#4FB6E8"></b>Water &amp; gas</span>
                </div>
                <div class="ph-order">
                  <p class="ph-row"><strong>On the way</strong><span>12 min</span></p>
                  <div class="ph-progress"><i class="done"></i><i class="done"></i><i class="now"></i><i></i></div>
                  <p class="ph-small">Rider has picked up your order</p>
                </div>
                <span class="ph-cta">Track order</span>
              </div>
            </div>
            <div class="toasts" aria-hidden="true">
              <div class="toast"><small>Rider app</small><strong>New pickup</strong><span>2 items from Store 3</span></div>
              <div class="toast"><small>Admin panel</small><strong>148 orders today</strong><span>3 need attention</span></div>
            </div>
          </div>
          <p class="panel-caption">Example: customer app, rider app and admin panel for a delivery service</p>
        </div>

        <!-- Trading system example -->
        <div class="panel panel-trade" role="tabpanel" id="panel-trade" aria-labelledby="tab-trade" tabindex="0" hidden>
          <div class="panel-body t-body">
            <div class="t-top">
              <p class="t-sym"><strong>XAU/USD</strong><span>Gold, 30-minute chart</span></p>
              <span class="t-status"><i aria-hidden="true"></i>EA running</span>
            </div>
            <div class="t-chart">
              <svg id="chart" viewBox="0 0 640 260" preserveAspectRatio="none" role="img" aria-label="Example gold price chart with buy entries placed by an Expert Advisor"></svg>
            </div>
            <dl class="t-metrics">
              <div><dt>Risk per trade</dt><dd>1.0%</dd></div>
              <div><dt>Daily loss limit</dt><dd>4.0%</dd></div>
              <div><dt>Spread filter</dt><dd>Max 35 pts</dd></div>
              <div><dt>Max positions</dt><dd>3</dd></div>
            </dl>
          </div>
          <p class="panel-caption">Example: MetaTrader 5 Expert Advisor with built-in risk controls</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stack -->
  <div class="stack">
    <div class="container">
      <p class="stack-line"><span class="stack-lead">Built with</span><span>Flutter</span><span>React</span><span>FastAPI</span><span>PHP</span><span>PostgreSQL</span><span>SQLite</span><span>MQL5</span><span>Cloudflare</span></p>
    </div>
  </div>

  <!-- Services -->
  <section id="services" class="section" aria-labelledby="services-title">
    <div class="container">
      <div class="section-head">
        <h2 id="services-title">What we build</h2>
        <p>Five kinds of work, one standard: secure, documented software that belongs to you.</p>
      </div>

      <div class="service-list">
        <article class="service">
          <h3>Business software</h3>
          <p class="service-desc">Accounting, invoicing, point of sale, stock, payroll, HR and complete management systems for businesses and offices, built around the way you already work instead of a one-size-fits-all package.</p>
          <div>
            <ul>
              <li>Point of sale and stock control for shops and restaurants</li>
              <li>Invoicing, expenses and financial reports</li>
              <li>Staff roles, permissions and an audit trail</li>
            </ul>
            <p class="service-stack">Online, offline or both. Usually Flutter with a FastAPI backend</p>
          </div>
        </article>

        <article class="service">
          <h3>Web platforms</h3>
          <p class="service-desc">Booking systems, customer portals, admin dashboards and company websites, shaped around how your business actually runs day to day.</p>
          <div>
            <ul>
              <li>Staff logins and admin panels</li>
              <li>Online bookings, quotes and payments</li>
              <li>Hosting, backups and SSL set up for you</li>
            </ul>
            <p class="service-stack">Usually React, PHP or FastAPI with PostgreSQL</p>
          </div>
        </article>

        <article class="service">
          <h3>Mobile apps</h3>
          <p class="service-desc">Android and iOS apps from a single codebase, delivered with the backend and admin tools you need to run them.</p>
          <div>
            <ul>
              <li>Customer, staff and rider apps</li>
              <li>Maps, notifications and live tracking</li>
              <li>Play Store and App Store release</li>
            </ul>
            <p class="service-stack">Usually Flutter with a FastAPI backend</p>
          </div>
        </article>

        <article class="service">
          <h3>Trading automation</h3>
          <p class="service-desc">Expert Advisors and indicators for MetaTrader 5, coded from your strategy rules and tested before they go near a live account.</p>
          <div>
            <ul>
              <li>Strategy coding in MQL5</li>
              <li>Backtesting and optimisation in Strategy Tester</li>
              <li>Risk controls and VPS deployment</li>
            </ul>
            <p class="service-stack">MQL5 on MetaTrader 5</p>
          </div>
        </article>

        <article class="service">
          <h3>Audits and rescue</h3>
          <p class="service-desc">A project that won't compile, keeps crashing or leaks customer data? We find the problems, explain them in plain language and fix them.</p>
          <div>
            <ul>
              <li>Code and security review</li>
              <li>Bug fixing and compile errors</li>
              <li>Performance and clean-up</li>
            </ul>
            <p class="service-stack">Works with the stack you already have</p>
          </div>
        </article>
      </div>

      <div class="modes">
        <div class="modes-head">
          <h3>Online, offline or both</h3>
          <p>Every system is built for how and where your business works, including places where the internet can't be relied on.</p>
        </div>
        <div class="mode-grid">
          <div class="mode">
            <span class="mode-label"><i aria-hidden="true"></i>Cloud</span>
            <h4>Online</h4>
            <p>Use it in a browser or on your phone from anywhere, with updates and backups handled for you.</p>
          </div>
          <div class="mode">
            <span class="mode-label"><i class="off" aria-hidden="true"></i>Desktop</span>
            <h4>Offline</h4>
            <p>Runs on your own computers or office server with no internet needed, and your data stays on your premises.</p>
          </div>
          <div class="mode mode--both">
            <span class="mode-label"><i aria-hidden="true"></i>Hybrid</span>
            <h4>Online and offline</h4>
            <p>Keeps working when the connection drops, then syncs everything to the cloud automatically once it's back.</p>
          </div>
        </div>
        <p class="industries"><span class="industries-lead">Built for</span><span>Shops</span><span>Restaurants and cafés</span><span>Workshops and garages</span><span>Clinics</span><span>Schools and training centres</span><span>Construction</span><span>Logistics and delivery</span><span>Manufacturing</span><span>Offices and organisations</span><span>Traders</span></p>
      </div>
    </div>
  </section>

  @if($featuredProjects->isNotEmpty())
  <!-- Selected work -->
  <section id="work" class="section section--surface" aria-labelledby="work-title">
    <div class="container">
      <div class="section-head">
        <h2 id="work-title">Selected work</h2>
        <p>A few of the systems, apps and tools we've built for clients.</p>
      </div>
      <div class="work-grid">
        @foreach($featuredProjects as $project)
          @include('partials.work-card', ['project' => $project])
        @endforeach
      </div>
      <p class="section-more"><a class="btn btn-primary" href="{{ route('work.index') }}">See all our work</a></p>
    </div>
  </section>
  @endif

  <!-- Process -->
  <section id="process" class="section section--surface" aria-labelledby="process-title">
    <div class="container">
      <div class="section-head">
        <h2 id="process-title">How a project runs</h2>
        <p>A clear route from first conversation to launch, with a working build to try every week.</p>
      </div>
      <ol class="steps">
        <li>
          <span class="step-n" aria-hidden="true">1</span>
          <h3>Talk it through</h3>
          <p>A free call about the problem, the people who will use the software and your budget. Honest advice, even if the answer is that you don't need custom software.</p>
        </li>
        <li>
          <span class="step-n" aria-hidden="true">2</span>
          <h3>Get a written quote</h3>
          <p>Scope, timeline and a fixed price agreed in writing before any work starts.</p>
        </li>
        <li>
          <span class="step-n" aria-hidden="true">3</span>
          <h3>Watch it take shape</h3>
          <p>Weekly builds you can click through and comment on, instead of one big reveal at the end.</p>
        </li>
        <li>
          <span class="step-n" aria-hidden="true">4</span>
          <h3>Launch and keep running</h3>
          <p>Deployment, full source code handover and a support plan for updates, fixes and backups.</p>
        </li>
      </ol>
    </div>
  </section>

  <!-- Pricing -->
  <section id="pricing" class="section" aria-labelledby="pricing-title">
    <div class="container">
      <div class="section-head">
        <h2 id="pricing-title">Starting prices</h2>
        <div class="pricing-tools">
          <p>Every project gets a fixed written quote after the first call. These prices show where each kind of work starts.</p>
          <div class="region" role="group" aria-labelledby="region-label">
            <span class="region-label" id="region-label">Prices for</span>
            <div class="segmented">
              @foreach(config('site.regions') as $key => $region)
                <button type="button" data-region="{{ $key }}" aria-pressed="{{ $key === config('site.default_region') ? 'true' : 'false' }}">{{ $region['short'] }}</button>
              @endforeach
            </div>
          </div>
          <p class="sr-only" aria-live="polite" data-region-status></p>
        </div>
      </div>

      <div class="price-list">
        @php($defaultRegion = config('site.default_region'))
        @foreach(config('site.price_items') as $key => $item)
          @php($amount = $site['pricing'][$defaultRegion]['prices'][$key] ?? 0)
          <article class="price-row">
            <div class="price-main">
              <h3>{{ $item['name'] }}</h3>
              <p>{{ $item['description'] }}</p>
            </div>
            <ul class="price-includes">
              @foreach($item['includes'] as $line)<li>{{ $line }}</li>@endforeach
            </ul>
            <p class="price {{ $amount > 0 ? '' : 'is-quote' }}"><span class="price-from">From</span><strong data-price="{{ $key }}">{{ \App\Support\Site::money($defaultRegion, $amount) }}</strong>@if($item['monthly'])<span class="price-unit">per month</span>@endif</p>
          </article>
        @endforeach
      </div>

      <div class="pricing-foot">
        <p class="pricing-note">Prices exclude any applicable taxes and third-party costs such as hosting renewals, app store fees and VPS rental. Your final price depends on the scope we agree.</p>
        <a class="btn btn-primary" href="#contact">Get a fixed quote</a>
      </div>
    </div>
  </section>

  <!-- Trading -->
  <section id="trading" class="section band" aria-labelledby="trading-title">
    <div class="container band-grid">
      <div>
        <h2 id="trading-title">Trading systems built for live markets, not just backtests.</h2>
        <p class="band-lede">We turn your strategy rules into MetaTrader 5 Expert Advisors, test them against real trading conditions and set them up to run around the clock.</p>
        <a class="btn btn-primary" href="#contact">Discuss a trading system</a>
        <p class="disclaimer">Trading carries a high risk of loss. 3HDS builds and tests trading software. We don't give investment advice or promise returns. <a href="{{ route('risk') }}">Read the full risk disclosure</a>.</p>
      </div>
      <dl class="band-list">
        <div>
          <dt>Risk controls in the code</dt>
          <dd>Equity stops, daily drawdown limits and floating-loss caps that act before a bad day turns into a blown account.</dd>
        </div>
        <div>
          <dt>Tested on real spreads</dt>
          <dd>Spread data logged from your broker, so test results reflect what your account actually pays to trade.</dd>
        </div>
        <div>
          <dt>Running around the clock</dt>
          <dd>Deployed to a MetaTrader VPS, with every input documented so you know exactly what each setting does.</dd>
        </div>
        <div>
          <dt>Existing EAs fixed</dt>
          <dd>Compile errors, missing indicators and trades that never trigger, diagnosed and fixed from your .mq5 source.</dd>
        </div>
      </dl>
    </div>
  </section>

  <!-- Principles -->
  <section class="section" aria-labelledby="principles-title">
    <div class="container split">
      <h2 id="principles-title">What working with us looks like</h2>
      <div class="principles">
        <div class="principle">
          <h3>You speak to the people building it</h3>
          <p>The people scoping your project are the people writing the code, so nothing gets lost between account managers.</p>
        </div>
        <div class="principle">
          <h3>You own what we build</h3>
          <p>Source code, domains, hosting and app store accounts are set up in your name and handed over at launch.</p>
        </div>
        <div class="principle">
          <h3>Security is part of the build</h3>
          <p>Hashed passwords, protected customer data and a security review before anything goes live.</p>
        </div>
        <div class="principle">
          <h3>Straight answers</h3>
          <p>Realistic estimates, a fixed written quote and plain explanations, including when something isn't worth building.</p>
        </div>
      </div>
    </div>
  </section>

  @if($testimonials->isNotEmpty())
  <!-- Testimonials -->
  <section id="testimonials" class="section section--surface" aria-labelledby="testimonials-title">
    <div class="container">
      <div class="section-head">
        <h2 id="testimonials-title">What clients say</h2>
      </div>
      <div class="quote-grid">
        @foreach($testimonials as $testimonial)
          <figure class="quote">
            <blockquote>{{ $testimonial->content }}</blockquote>
            <figcaption>
              @if($testimonial->client_image)
                <img src="{{ asset('storage/'.$testimonial->client_image) }}" alt="">
              @else
                <span class="quote-initial" aria-hidden="true">{{ mb_substr($testimonial->client_name, 0, 1) }}</span>
              @endif
              <span>
                <span class="quote-name">{{ $testimonial->client_name }}</span><br>
                <span class="quote-role">{{ $testimonial->client_position }}, {{ $testimonial->client_company }}</span>
              </span>
            </figcaption>
          </figure>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  <!-- Team -->
  @if($team->isNotEmpty())
  <section id="team" class="section section--surface" aria-labelledby="team-title">
    <div class="container">
      <div class="section-head">
        <h2 id="team-title">The people behind 3HDS</h2>
        <p>A small team working with clients in Australia, the United Kingdom and Pakistan. You deal directly with the people who plan and build your project.</p>
      </div>
      <div class="team-grid">
        @foreach($team as $member)
          <article class="person">
            <div class="person-mark" aria-hidden="true">
              @if($member->photo)<img src="{{ asset('storage/'.$member->photo) }}" alt="">@else{{ $member->initials }}@endif
            </div>
            <div>
              <h3>{{ $member->name }}</h3>
              <ul class="person-roles">
                <li>{{ $member->role }}</li>
                @foreach($member->other_roles_list as $role)<li>{{ $role }}</li>@endforeach
              </ul>
              @if($member->location)<p class="person-place">Based in {{ $member->location }}</p>@endif
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  @if($latestPosts->isNotEmpty())
  <!-- Blog -->
  <section id="blog" class="section" aria-labelledby="blog-title">
    <div class="container">
      <div class="section-head">
        <h2 id="blog-title">From the blog</h2>
        <p>Notes on building business software, apps and trading systems.</p>
      </div>
      <div class="post-grid">
        @foreach($latestPosts as $post)
          @include('partials.post-card', ['post' => $post])
        @endforeach
      </div>
      <p class="section-more"><a class="btn btn-primary" href="{{ route('blog.index') }}">Read the blog</a></p>
    </div>
  </section>
  @endif

  <!-- FAQ -->
  <section id="faq" class="section" aria-labelledby="faq-title">
    <div class="container">
      <div class="faq">
        <h2 id="faq-title">Questions clients ask</h2>
        <details>
          <summary>Can the software work without internet?</summary>
          <p>Yes. We can build desktop software that runs fully offline on your own computers, cloud software you use in a browser, or a hybrid that keeps working when the connection drops and syncs automatically when it's back. We'll recommend the right setup on the first call.</p>
        </details>
        <details>
          <summary>How much does a project cost?</summary>
          <p>Starting prices for each kind of work are listed in the pricing section. After the first call you receive a written quote with a fixed price for the agreed scope, so the number doesn't move unless the scope does.</p>
        </details>
        <details>
          <summary>How long will it take?</summary>
          <p>A company website can be ready in a few weeks. Web platforms and mobile apps usually take a few months. Your quote includes a timeline with weekly milestones.</p>
        </details>
        <details>
          <summary>Who owns the code?</summary>
          <p>You do. The full source code, along with hosting, domain and app store accounts, is handed over in your name.</p>
        </details>
        <details>
          <summary>Can you work on software someone else built?</summary>
          <p>Yes. We review what's there, explain the problems in plain language and fix them. For MetaTrader Expert Advisors we need the .mq5 source file, because compiled .ex5 files can't be edited.</p>
        </details>
        <details>
          <summary>Do your trading systems guarantee profits?</summary>
          <p>No, and you should be wary of anyone who says theirs do. We build Expert Advisors that follow your rules precisely and include risk controls. Trading carries a high risk of loss. Read our full <a href="{{ route('risk') }}">risk disclosure</a>.</p>
        </details>
        <details>
          <summary>What happens after launch?</summary>
          <p>You can choose a support plan covering updates, fixes, backups and monitoring, or take a clean handover and manage it yourself.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="section contact" aria-labelledby="contact-title">
    <div class="container">
    <div class="contact-grid">
      <div class="contact-copy">
        <h2 id="contact-title">Tell us what you want to build.</h2>
        <p>Share a few details and we'll reply with questions, a suggested approach and next steps. No obligation.</p>
        @if($site['email'])
        <div class="contact-direct">
          <a class="contact-link" href="mailto:{{ $site['email'] }}"><span>Email</span><strong>{{ $site['email'] }}</strong></a>
        </div>
        @endif
      </div>

      <form class="form" id="contact-form" method="POST" action="{{ route('contact.store') }}">
        @csrf
        @if(session('contact_success'))
          <p class="form-alert form-alert--ok" role="status">{{ session('contact_success') }}</p>
        @elseif($errors->any())
          <p class="form-alert form-alert--error" role="alert">Please check the highlighted fields and send again.</p>
        @endif
        <div class="field">
          <label for="f-name">Your name</label>
          <input id="f-name" name="name" type="text" autocomplete="name" required maxlength="255" value="{{ old('name') }}" @error('name') aria-invalid="true" @enderror aria-describedby="e-name">
          @error('name')<p class="error" id="e-name">{{ $message }}</p>@enderror
        </div>
        <div class="field">
          <label for="f-email">Email</label>
          <input id="f-email" name="email" type="email" autocomplete="email" required maxlength="255" value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror aria-describedby="e-email">
          @error('email')<p class="error" id="e-email">{{ $message }}</p>@enderror
        </div>
        <div class="field field-full">
          <label for="f-type">What do you need?</label>
          <select id="f-type" name="need" @error('need') aria-invalid="true" @enderror>
            @foreach(config('site.enquiry_types') as $type)
              <option @selected(old('need') === $type)>{{ $type }}</option>
            @endforeach
          </select>
          @error('need')<p class="error">{{ $message }}</p>@enderror
        </div>
        <div class="field field-full">
          <label for="f-msg">Project details</label>
          <textarea id="f-msg" name="message" rows="5" required maxlength="5000" @error('message') aria-invalid="true" @enderror aria-describedby="e-msg" placeholder="What should it do, who will use it, and when do you need it?">{{ old('message') }}</textarea>
          @error('message')<p class="error" id="e-msg">{{ $message }}</p>@enderror
        </div>
        <div class="hp" aria-hidden="true">
          <label for="f-website">Leave this field empty</label>
          <input id="f-website" name="website" type="text" tabindex="-1" autocomplete="off">
        </div>
        @if(config('services.recaptcha.site_key'))
          <div class="captcha">
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
            @error('captcha')<p class="error">{{ $message }}</p>@enderror
          </div>
          @push('scripts')<script src="https://www.google.com/recaptcha/api.js" async defer></script>@endpush
        @endif
        <div class="form-foot field-full">
          <button class="btn btn-primary" type="submit">Send message</button>
          <p class="form-note">Your message comes straight to our inbox. Read our <a href="{{ route('privacy') }}">privacy policy</a>.</p>
        </div>
      </form>
    </div>
    <section class="offices" aria-labelledby="offices-title">
      <h3 id="offices-title">Where to reach us</h3>
      <div class="office-grid">
        @foreach($site['offices'] as $key => $office)
          <article class="office">
            <h4>{{ $office['country'] }}</h4>
            @if($office['city'])<p class="office-city">{{ $office['city'] }}</p>@endif
            <p class="office-time"><span data-timezone="{{ $office['timezone'] }}">--:--</span> local time</p>
            @if($office['address'] || $office['phone'] || $office['whatsapp'] || $office['email'])
            <dl class="office-details">
              @if($office['address'])<div><dt>Address</dt><dd>{{ $office['address'] }}</dd></div>@endif
              @if($office['phone'])<div><dt>Phone</dt><dd><a href="tel:{{ \App\Support\Site::tel($office['phone']) }}">{{ $office['phone'] }}</a></dd></div>@endif
              @if($office['whatsapp'])<div><dt>WhatsApp</dt><dd><a href="https://wa.me/{{ \App\Support\Site::digits($office['whatsapp']) }}" target="_blank" rel="noopener">{{ $office['whatsapp'] }}</a></dd></div>@endif
              @if($office['email'])<div><dt>Email</dt><dd><a href="mailto:{{ $office['email'] }}">{{ $office['email'] }}</a></dd></div>@endif
            </dl>
            @endif
          </article>
        @endforeach
      </div>
    </section>
    </div>
  </section>
@endsection
