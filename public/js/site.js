/* 3HDS Services public site */
(function () {
  'use strict';

  // Settings passed from the server (pricing etc.), only present on the home page
  let data = {};
  const dataEl = document.getElementById('site-data');
  if (dataEl) {
    try { data = JSON.parse(dataEl.textContent); } catch (err) { data = {}; }
  }

  // Mobile menu
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.getElementById('site-nav');
  if (toggle && nav) {
    const closeMenu = () => { nav.classList.remove('is-open'); toggle.setAttribute('aria-expanded', 'false'); };
    toggle.addEventListener('click', () => {
      const open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));
    });
    nav.addEventListener('click', e => { if (e.target.closest('a')) closeMenu(); });
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) { closeMenu(); toggle.focus(); }
    });
    window.addEventListener('resize', () => { if (window.innerWidth > 980) closeMenu(); });
  }

  // Example tabs in the hero
  const tabs = Array.from(document.querySelectorAll('[role="tab"]'));
  function selectTab(tab, moveFocus) {
    tabs.forEach(t => {
      const on = t === tab;
      t.setAttribute('aria-selected', String(on));
      t.tabIndex = on ? 0 : -1;
      const panel = document.getElementById(t.getAttribute('aria-controls'));
      if (panel) panel.hidden = !on;
    });
    if (moveFocus) tab.focus();
  }
  tabs.forEach((tab, i) => {
    tab.addEventListener('click', () => selectTab(tab));
    tab.addEventListener('keydown', e => {
      let next = null;
      if (e.key === 'ArrowRight') next = tabs[(i + 1) % tabs.length];
      if (e.key === 'ArrowLeft') next = tabs[(i - 1 + tabs.length) % tabs.length];
      if (e.key === 'Home') next = tabs[0];
      if (e.key === 'End') next = tabs[tabs.length - 1];
      if (next) { e.preventDefault(); selectTab(next, true); }
    });
  });

  // Candlestick chart (seeded, so it looks the same every visit)
  (function drawChart() {
    const svg = document.getElementById('chart');
    if (!svg) return;
    const NS = 'http://www.w3.org/2000/svg';
    const W = 640, H = 260, TOP = 14, BOTTOM = 30, N = 54;
    let seed = 20260916;
    const rand = () => {
      seed |= 0; seed = seed + 0x6D2B79F5 | 0;
      let t = Math.imul(seed ^ seed >>> 15, 1 | seed);
      t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
      return ((t ^ t >>> 14) >>> 0) / 4294967296;
    };
    const candles = [];
    let price = 100;
    for (let i = 0; i < N; i++) {
      const drift = Math.sin(i / 6.5) * 0.55 + 0.22;
      const open = price;
      const close = open + (rand() - 0.5) * 2.4 + drift;
      const high = Math.max(open, close) + rand() * 1.1;
      const low = Math.min(open, close) - rand() * 1.1;
      candles.push({ open, close, high, low });
      price = close;
    }
    const max = Math.max(...candles.map(c => c.high));
    const min = Math.min(...candles.map(c => c.low));
    const y = v => TOP + (max - v) / (max - min) * (H - TOP - BOTTOM);
    const step = W / N;
    const bodyW = step * 0.58;
    const el = (name, attrs) => { const n = document.createElementNS(NS, name); for (const k in attrs) n.setAttribute(k, attrs[k]); return n; };
    for (let g = 1; g < 4; g++) {
      svg.appendChild(el('line', { class: 'grid-line', x1: 0, x2: W, y1: H * g / 4, y2: H * g / 4 }));
    }
    candles.forEach((c, i) => {
      const x = i * step + step / 2;
      const group = el('g', { class: 'candle ' + (c.close >= c.open ? 'up' : 'down') });
      group.style.setProperty('--i', i);
      group.appendChild(el('line', { x1: x, x2: x, y1: y(c.high), y2: y(c.low) }));
      const top = y(Math.max(c.open, c.close));
      const height = Math.max(1.5, Math.abs(y(c.open) - y(c.close)));
      group.appendChild(el('rect', { x: x - bodyW / 2, y: top, width: bodyW, height: height, rx: 1 }));
      svg.appendChild(group);
    });
    const entries = [];
    for (let i = 3; i < N - 3 && entries.length < 4; i++) {
      const lows = candles.slice(i - 3, i + 4).map(c => c.low);
      if (candles[i].low === Math.min(...lows) && (!entries.length || i - entries[entries.length - 1] > 8)) entries.push(i);
    }
    entries.forEach(i => {
      const x = i * step + step / 2;
      const base = Math.min(H - 4, y(candles[i].low) + 18);
      svg.appendChild(el('polygon', { class: 'entry', points: `${x - 6},${base} ${x + 6},${base} ${x},${base - 9}` }));
    });
  })();

  // Pricing by country
  const regionButtons = Array.from(document.querySelectorAll('[data-region]'));
  const regionStatus = document.querySelector('[data-region-status]');
  const pricing = data.pricing || {};
  function setRegion(key, announce) {
    const region = pricing[key];
    if (!region) return;
    regionButtons.forEach(b => b.setAttribute('aria-pressed', String(b.dataset.region === key)));
    document.querySelectorAll('[data-price]').forEach(el => {
      const value = region.prices[el.dataset.price];
      const wrap = el.closest('.price');
      if (value) { el.textContent = region.symbol + Number(value).toLocaleString('en-US'); wrap.classList.remove('is-quote'); }
      else { el.textContent = 'Custom quote'; wrap.classList.add('is-quote'); }
    });
    if (announce && regionStatus) regionStatus.textContent = 'Showing prices for ' + region.label;
    try { localStorage.setItem('3hds-region', key); } catch (err) { /* storage unavailable */ }
  }
  if (regionButtons.length) {
    let start = null;
    try { start = localStorage.getItem('3hds-region'); } catch (err) { start = null; }
    if (!pricing[start]) {
      const tz = (Intl.DateTimeFormat().resolvedOptions().timeZone || '');
      start = tz.startsWith('Australia/') ? 'au' : (tz === 'Asia/Karachi' ? 'pk' : (data.defaultRegion || 'uk'));
    }
    setRegion(start, false);
    regionButtons.forEach(b => b.addEventListener('click', () => setRegion(b.dataset.region, true)));
  }

  // Local time for each country
  const clocks = Array.from(document.querySelectorAll('[data-timezone]'));
  const updateTimes = () => clocks.forEach(el => {
    try {
      el.textContent = new Intl.DateTimeFormat('en-GB', { hour: '2-digit', minute: '2-digit', timeZone: el.dataset.timezone }).format(new Date());
    } catch (err) { el.parentElement.hidden = true; }
  });
  if (clocks.length) { updateTimes(); setInterval(updateTimes, 30000); }

  // Disable the send button while the form submits, to stop double sending
  const form = document.getElementById('contact-form');
  if (form) {
    form.addEventListener('submit', () => {
      const btn = form.querySelector('[type="submit"]');
      if (btn) { btn.disabled = true; btn.textContent = 'Sending…'; }
    });
  }
})();
