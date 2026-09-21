<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts' => Post::count(),
            'published_posts' => Post::where('is_published', true)->count(),
            'products' => Project::count(),
            'testimonials' => Testimonial::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
        ];

        $recent_posts = Post::latest()->limit(5)->get();
        $recent_contacts = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_posts', 'recent_contacts'));
    }
}

