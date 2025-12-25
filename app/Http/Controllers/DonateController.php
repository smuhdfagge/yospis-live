<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DonateController extends Controller
{
    /**
     * Display the donate page.
     */
    public function index(): View
    {
        return view('public.donate');
    }
}
