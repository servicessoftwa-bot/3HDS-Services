<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Support\Site;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'site' => Site::data(),
            'team' => TeamMember::visible()->get(),
            'featuredProjects' => Project::featured()->limit(3)->get(),
            'testimonials' => Testimonial::featured()->limit(3)->get(),
            'latestPosts' => Post::published()->limit(3)->get(),
        ]);
    }
}
