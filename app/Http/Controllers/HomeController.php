<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Partner;
use App\Models\Project;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index(): View
    {
        $featuredProjects = Project::featured()->latest()->take(3)->get();
        $latestNews = Article::published()->latest('published_at')->take(3)->get();
        $partners = Partner::active()->ordered()->take(8)->get();

        return view('public.home', compact('featuredProjects', 'latestNews', 'partners'));
    }
}
