<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', fn () => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Blog posts
    Route::resource('posts', PostController::class)->except(['show'])->names('admin.posts');

    // Portfolio (stored as "projects"; the admin URLs keep the original "products" name)
    Route::resource('products', ProductController::class)->except(['show'])->names('admin.products');

    // Testimonials
    Route::resource('testimonials', TestimonialController::class)->except(['show'])->names('admin.testimonials');

    // Team members
    Route::resource('team', TeamMemberController::class)
        ->except(['show'])
        ->parameters(['team' => 'member'])
        ->names('admin.team');

    // Enquiries from the contact form
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::patch('/contacts/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('admin.contacts.mark-read');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    // Site settings
    Route::get('/settings/general', [SettingsController::class, 'general'])->name('admin.settings.general');
    Route::put('/settings/general', [SettingsController::class, 'updateGeneral'])->name('admin.settings.general.update');
    Route::get('/settings/pricing', [SettingsController::class, 'pricing'])->name('admin.settings.pricing');
    Route::put('/settings/pricing', [SettingsController::class, 'updatePricing'])->name('admin.settings.pricing.update');
    Route::get('/settings/offices', [SettingsController::class, 'offices'])->name('admin.settings.offices');
    Route::put('/settings/offices', [SettingsController::class, 'updateOffices'])->name('admin.settings.offices.update');
});
