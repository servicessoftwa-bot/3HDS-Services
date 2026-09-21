# 3HDS Services

[![laravel](https://img.shields.io/badge/Laravel-11-2F3CF4?style=flat-square&labelColor=0D1433&logo=laravel&logoColor=white)](https://laravel.com)
![php](https://img.shields.io/badge/PHP-8.2+-4A3AEF?style=flat-square&labelColor=0D1433&logo=php&logoColor=white)
![database](https://img.shields.io/badge/database-MySQL%20%7C%20SQLite-6E38E8?style=flat-square&labelColor=0D1433&logo=mysql&logoColor=white)
![tailwind](https://img.shields.io/badge/Tailwind-CSS-9435DE?style=flat-square&labelColor=0D1433&logo=tailwindcss&logoColor=white)
![license](https://img.shields.io/badge/license-proprietary-B833C9?style=flat-square&labelColor=0D1433)
![last commit](https://img.shields.io/github/last-commit/servicessoftwa-bot/3HDS-Services?style=flat-square&labelColor=0D1433&color=2F3CF4)

The 3HDS Services company website with an admin panel, built on Laravel 11. It combines the 3HDS design with the admin system from iWebCircle.

> **Hosting note.** This is a PHP application and needs PHP hosting with a database.
> It cannot run on Cloudflare Pages or GitHub Pages, which serve static files only.
> See [Deploying to PHP hosting](#deploying-to-php-hosting-cpanel-or-similar).

## What's in it

**Public site**
- The one-page 3HDS site: services, online and offline business software, process, prices for the UK, Australia and Pakistan, trading systems, team, FAQ and contact form
- Portfolio at `/work` and blog at `/blog`. Both appear in the menu and on the home page once they have content
- Testimonials on the home page, once added
- Privacy policy, terms and risk disclosure at `/privacy`, `/terms` and `/risk-disclosure`
- Automatic `sitemap.xml` and `robots.txt`, and a branded 404 page

**Admin panel** at `/login`
- **Enquiries:** every contact form message is saved here, and also emailed to you if an email address is set
- **Portfolio, Testimonials, Blog Posts:** add and edit content with images
- **Team:** names, roles, locations and photos
- **Settings → General:** main email, WhatsApp button, logo, social links, company registration details, analytics
- **Settings → Prices:** starting prices for each country (0 shows "Custom quote")
- **Settings → Country contacts:** city, address, phone, WhatsApp and email for the UK, Australia and Pakistan

## Requirements

PHP 8.2 or newer, MySQL (or SQLite), Composer, and Node.js to build the admin styles.

## First-time setup (on your computer)

```bash
composer update --lock          # once: refreshes composer.lock after the dependency fix
composer install
cp .env.example .env
php artisan key:generate
# edit .env: database details, and APP_URL / APP_ENV=local / APP_DEBUG=true for local work
php artisan migrate --seed      # creates tables, starting settings and the team
php artisan app:create-admin    # asks for your email and a password (12+ characters)
php artisan storage:link        # lets uploaded images show on the site
npm install && npm run build    # builds the admin panel styles
php artisan serve               # open http://localhost:8000
```

Run the automated checks at any time with `php artisan test`. They use a temporary in-memory database and never touch your real data.

## Deploying to PHP hosting (cPanel or similar)

1. Upload the project, but point the domain's **document root at the `public` folder**, never the project root.
2. Create a MySQL database and put its details in `.env`, with `APP_ENV=production`, `APP_DEBUG=false` and your real `APP_URL`.
3. Add your email provider's SMTP details to `.env` so enquiry emails and password resets work.
4. On the server:

```bash
composer install --no-dev --optimize-autoloader
php artisan key:generate        # first deploy only
php artisan migrate --force --seed
php artisan app:create-admin    # first deploy only
php artisan storage:link
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

Build the admin styles with `npm run build` on your computer and upload the `public/build` folder, since most shared hosts don't have Node.

After changing `.env` later, run `php artisan config:cache` again.

## Where things live

| What | Where |
|---|---|
| Home page | `resources/views/home.blade.php` |
| Header, footer, meta tags | `resources/views/layouts/site.blade.php` |
| Public styles and scripts | `public/css/site.css`, `public/js/site.js` (no build step) |
| Price packages and countries | `config/site.php` (prices themselves are edited in the admin) |
| Legal pages | `resources/views/legal/` |
| Admin screens | `resources/views/admin/` |

## Changes from the original iWebCircle code

- **Deployment fixes.** `laravel/ui` was a development-only package, so production installs broke login. The admin stylesheet was also missing from the Vite build, so the admin panel errored after `npm run build`.
- **No default admin account.** The seeded `admin@iwebcircle.com` / `password` login is gone; accounts are created with `php artisan app:create-admin`.
- **Public sign-up switched off.** `/register` no longer exists, and `is_admin` can't be set through form input.
- **Contact form.** Rate-limited to 5 per minute, with a hidden spam trap. reCAPTCHA is optional instead of required, and enquiries are emailed as well as saved.
- **Security headers** on every page (clickjacking, content sniffing, referrer and permissions policies, HSTS on HTTPS).
- **No demo content.** The invented projects, clients, testimonials and statistics were removed.
- **Password reset** now returns to the dashboard instead of a missing `/home` page.

## The previous static site

The one-file static version of the site lives in `legacy-static/`. It was what ran on
Cloudflare Pages at `3hds.pages.dev` before this Laravel app replaced it, and it is kept
for reference and as a fallback.

| File | Purpose |
|---|---|
| `legacy-static/index.html` | The whole previous site, CSS and JS inline |
| `legacy-static/_headers` | Security headers and CSP, Cloudflare Pages format |
| `legacy-static/404.html` | Previous error page |
| `legacy-static/robots.txt`, `legacy-static/sitemap.xml` | Replaced here by Laravel, which generates both |

`3hds-laravel.zip` is the original archive this app was unpacked from. It duplicates the
tracked source and can be deleted once you are happy with the swap.

## Badge colours

The badges above use a custom ramp built from the site's brand cobalt, with one shared
ink label so the row reads as a single unit.

| Role | Hex |
|---|---|
| Ink (all labels) | `0D1433` |
| Cobalt (brand) | `2F3CF4` |
| Indigo | `4A3AEF` |
| Violet | `6E38E8` |
| Purple | `9435DE` |
| Magenta | `B833C9` |
