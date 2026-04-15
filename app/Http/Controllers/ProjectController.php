<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index(): View
    {
        $ongoingProjects = Project::ongoing()->latest()->get();
        $completedProjects = Project::completed()->latest()->get();

        return view('public.projects.index', compact('ongoingProjects', 'completedProjects'));
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project): View
    {
        return view('public.projects.show', compact('project'));
    }
}
