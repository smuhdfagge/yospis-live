<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display the about page.
     */
    public function index(): View
    {
        return view('public.about');
    }

    /**
     * Display the team page.
     */
    public function team(): View
    {
        return view('public.team');
    }
}
