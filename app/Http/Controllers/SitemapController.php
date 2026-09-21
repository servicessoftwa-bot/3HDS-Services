<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('privacy'), 'priority' => '0.3'],
            ['loc' => route('terms'), 'priority' => '0.3'],
            ['loc' => route('risk'), 'priority' => '0.3'],
        ];

        if (Project::query()->exists()) {
            $urls[] = ['loc' => route('work.index'), 'priority' => '0.8'];
            foreach (Project::orderByDesc('updated_at')->get() as $project) {
                $urls[] = ['loc' => route('work.show', $project), 'lastmod' => $project->updated_at, 'priority' => '0.7'];
            }
        }

        $posts = Post::published()->get();
        if ($posts->isNotEmpty()) {
            $urls[] = ['loc' => route('blog.index'), 'priority' => '0.7'];
            foreach ($posts as $post) {
                $urls[] = ['loc' => route('blog.show', $post), 'lastmod' => $post->updated_at, 'priority' => '0.6'];
            }
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        foreach ($urls as $url) {
            $xml .= '  <url><loc>'.e($url['loc']).'</loc>';
            if (! empty($url['lastmod'])) {
                $xml .= '<lastmod>'.$url['lastmod']->format('Y-m-d').'</lastmod>';
            }
            $xml .= '<priority>'.$url['priority'].'</priority></url>'."\n";
        }
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
