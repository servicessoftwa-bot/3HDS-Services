# 3HDS Services website

Company website for 3HDS Services: web platforms, mobile apps and MetaTrader trading systems.

It is a single static file (`index.html`) with all CSS and JavaScript inline. No build step or dependencies. Fonts load from Google Fonts.

## Edit before going live

Open `index.html` and find the `CONFIG` block near the bottom of the file:

- `email`: main contact address
- `offices`: city, address, phone, WhatsApp and email for the UK, Australia and Pakistan (empty fields stay hidden)
- `team`: photo paths for team members (empty shows initials)
- `pricing`: starting prices per country (set a price to `0` to show "Custom quote")

## Deploy

Any static host works: GitHub Pages, Cloudflare Pages, Netlify or a normal cPanel web host.

**GitHub Pages:** push this folder to a repository, then go to Settings → Pages, choose "Deploy from a branch", select `main` and `/ (root)`, and save.

**Custom domain (3hds.com):** add the domain under Settings → Pages, then point your DNS at GitHub Pages as shown on that screen.

## Sections

Hero with example builds, services, process, starting prices (UK / Australia / Pakistan), trading systems, principles, team, FAQ, contact form and contact details by country.

The contact form opens the visitor's email app. It does not store submissions on a server.
