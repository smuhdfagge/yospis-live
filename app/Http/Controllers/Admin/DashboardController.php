<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $stats = [
            'total_articles' => Article::count(),
            'published_articles' => Article::published()->count(),
            'draft_articles' => Article::draft()->count(),
            'total_contacts' => Contact::count(),
            'unread_contacts' => Contact::unread()->count(),
            'total_projects' => Project::count(),
            'ongoing_projects' => Project::ongoing()->count(),
            'total_partners' => Partner::count(),
            'active_partners' => Partner::where('is_active', true)->count(),
        ];

        $recentArticles = Article::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'recentContacts'));
    }
}
