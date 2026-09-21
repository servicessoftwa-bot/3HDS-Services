<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home (the main 3HDS one-page site)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Portfolio
Route::get('/work', [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{project}', [WorkController::class, 'show'])->name('work.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

// Legal pages
Route::view('/privacy', 'legal.privacy')->name('privacy');
Route::view('/terms', 'legal.terms')->name('terms');
Route::view('/risk-disclosure', 'legal.risk')->name('risk');

// Contact form (max 5 submissions per minute per visitor)
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', fn () => response(
    "User-agent: *\nDisallow: /admin\nDisallow: /login\nDisallow: /password\n\nSitemap: ".route('sitemap')."\n",
    200, ['Content-Type' => 'text/plain']
));

// Addresses from the previous version of the site, kept so old links don't break
Route::permanentRedirect('/products', '/work');
Route::get('/products/{slug}', fn (string $slug) => redirect('/work/'.$slug, 301));
Route::permanentRedirect('/services', '/#services');
Route::permanentRedirect('/about', '/#team');
Route::permanentRedirect('/contact', '/#contact');

// Admin login and password reset. Public sign-up is switched off:
// admin accounts are created with `php artisan app:create-admin`.
Auth::routes(['register' => false, 'verify' => false]);
