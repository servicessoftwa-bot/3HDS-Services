<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Project;
use App\Support\Site;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Shared data for the public site layout (footer, contact details, nav)
        View::composer('layouts.site', function ($view) {
            $view->with('site', Site::data());
            $view->with('navHasWork', Project::query()->exists());
            $view->with('navHasBlog', Post::query()->published()->exists());
        });
    }
}
