<?php

namespace App\Http\Controllers;

use App\Models\Project;

class WorkController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->orderByDesc('created_at')->paginate(12);

        return view('work.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $more = Project::whereKeyNot($project->getKey())->orderBy('order')->limit(2)->get();

        return view('work.show', compact('project', 'more'));
    }
}
