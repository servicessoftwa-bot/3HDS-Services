# 3HDS Services website

Company website for 3HDS Services: web platforms, mobile apps and MetaTrader trading systems.

The whole site is one static file, `index.html`, with all CSS and JavaScript inline. There's no build step. The privacy policy, terms and risk disclosure are inside the same file and open at `#privacy`, `#terms` and `#risk-disclosure`.

## Files

| File | Purpose |
|---|---|
| `index.html` | The website |
| `404.html` | Page shown for broken links |
| `og-image.png` | Preview image when the link is shared on WhatsApp, LinkedIn, Facebook or X |
| `apple-touch-icon.png` | Icon when the site is saved to a phone home screen |
| `robots.txt`, `sitemap.xml` | Help Google find and index the site |

Upload all of them to the root of the repository.

## Edit before going live

Open `index.html` and find the `CONFIG` block near the bottom of the file. Anything left empty stays hidden on the page.

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
| `pricing` | Starting prices per country (`0` shows "Custom quote") |

## Domain

The social preview tags, `robots.txt` and `sitemap.xml` use `https://3hds.com/`. If the site lives at a different address, search and replace `https://3hds.com/` in `index.html`, `robots.txt` and `sitemap.xml`.

## Deploy with GitHub Pages

1. Upload all files to the repository root and commit.
2. Go to Settings → Pages, choose "Deploy from a branch", select `main` and `/ (root)`, and save.
3. To use 3hds.com, enter it under Custom domain and point your DNS at GitHub Pages as shown on that screen.

After launch, add the site to Google Search Console and submit `https://3hds.com/sitemap.xml`.
