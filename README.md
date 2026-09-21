# 3HDS Services

[![live](https://img.shields.io/badge/live-3hds.pages.dev-2F3CF4?style=flat-square&labelColor=0D1433&logo=cloudflare&logoColor=white)](https://3hds.pages.dev/)
![hosting](https://img.shields.io/badge/hosting-Cloudflare%20Pages-4A3AEF?style=flat-square&labelColor=0D1433)
![laravel](https://img.shields.io/badge/Laravel-11-6E38E8?style=flat-square&labelColor=0D1433&logo=laravel&logoColor=white)
![php](https://img.shields.io/badge/PHP-8.2+-9435DE?style=flat-square&labelColor=0D1433&logo=php&logoColor=white)
![license](https://img.shields.io/badge/license-proprietary-B833C9?style=flat-square&labelColor=0D1433)
![last commit](https://img.shields.io/github/last-commit/servicessoftwa-bot/3HDS-Services?style=flat-square&labelColor=0D1433&color=2F3CF4)

Company website for 3HDS Services: business software, web platforms, mobile apps and
MetaTrader trading systems, for clients in the UK, Australia and Pakistan.

## Two editions

This repository holds two versions of the same site. Pick one.

| Edition | Where | Use it when |
|---|---|---|
| **Static** | `index.html` at the repo root | You want the site up with no server, no database and no build step. This is what's live now. |
| **Laravel** | `3hds-laravel.zip` | You want an admin panel: enquiries, portfolio, blog, testimonials, team and editable prices. Needs PHP and MySQL hosting. |

The static edition is deployed. The Laravel edition is a drop-in replacement built on
Laravel 11 — unzip it and follow the README inside for setup.

## Static edition

One file, `index.html`, with all CSS and JavaScript inline. No build step. The privacy
policy, terms and risk disclosure live in the same file and open at `#privacy`, `#terms`
and `#risk-disclosure`.

| File | Purpose |
|---|---|
| `index.html` | The website |
| `404.html` | Page shown for broken links |
| `_headers` | Security headers and Content Security Policy, read by Cloudflare Pages |
| `og-image.png` | Preview image when the link is shared on WhatsApp, LinkedIn, Facebook or X |
| `apple-touch-icon.png` | Icon when the site is saved to a phone home screen |
| `robots.txt`, `sitemap.xml` | Help Google find and index the site |

### Edit before going live

Open `index.html` and find the `CONFIG` block near the bottom. Anything left empty stays
hidden on the page.

| Setting | What it does |
|---|---|
| `email` | Main contact address used across the site |
| `formEndpoint` | Makes the contact form send directly. Create a free form at formspree.io and paste its endpoint, e.g. `https://formspree.io/f/abcdwxyz` |
| `whatsappButton` | Shows a floating WhatsApp chat button |
| `logo` | Replaces the built-in logo mark with your own image |
| `social` | LinkedIn, GitHub, Facebook, Instagram, YouTube, X and MQL5 profile links in the footer |
| `company` | Legal name, UK company number and registered office, ABN, NTN |
| `cloudflareAnalyticsToken` | Cookie-free visitor statistics from Cloudflare Web Analytics |
| `offices` | City, address, phone, WhatsApp and email for the UK, Australia and Pakistan |
| `team` | Photo paths for team members |
| `pricing` | Starting prices per country, per service (`0` shows "Custom quote") |

### Services on the page

Business software (online, offline or hybrid), web platforms, mobile apps, trading
systems, plus security audits and ongoing support. Starting prices are set per country
in `CONFIG.pricing` under the keys `business`, `website`, `platform`, `app`, `trading`,
`audit` and `support`.

### Deploy

Live on **Cloudflare Pages** at `https://3hds.pages.dev/`. Connect the repository in the
Cloudflare dashboard, leave the build command empty and set the output directory to `/`.
Every push to `main` redeploys.

`_headers` is picked up automatically and applies HSTS, `X-Frame-Options: DENY`,
`nosniff`, a Referrer-Policy, a Permissions-Policy and a Content Security Policy. If you
add a third-party script or font, add its origin to the CSP in that file or the browser
will block it.

### Changing the domain

The canonical URL, Open Graph tags, `robots.txt` and `sitemap.xml` all use
`https://3hds.pages.dev/`. To move to a custom domain, search and replace that string in
`index.html`, `robots.txt` and `sitemap.xml`, then add the domain under Custom domains in
Cloudflare Pages.

After launch, add the site to Google Search Console and submit `/sitemap.xml`.

## Laravel edition

`3hds-laravel.zip` contains a full Laravel 11 application: the same public site plus an
admin panel at `/login` for enquiries, portfolio, blog posts, testimonials, team members,
country contacts and per-country prices. It adds `/work` and `/blog`, and generates
`sitemap.xml` and `robots.txt` itself.

Requires PHP 8.2 or newer, MySQL or SQLite, Composer and Node.js. Full setup steps are in
the README inside the zip.

## Badge colors

The badges above use a custom ramp derived from the site's brand cobalt, with a common
ink label so the row reads as one unit.

| Role | Hex |
|---|---|
| Ink (all labels) | `0D1433` |
| Cobalt (brand) | `2F3CF4` |
| Indigo | `4A3AEF` |
| Violet | `6E38E8` |
| Purple | `9435DE` |
| Magenta | `B833C9` |
