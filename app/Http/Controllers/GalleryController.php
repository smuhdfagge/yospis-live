<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the gallery page.
     */
    public function index(Request $request)
    {
        $query = Gallery::published()->ordered();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $galleries = $query->paginate(12);
        $categories = Gallery::published()->distinct()->pluck('category')->filter()->values();

        return view('public.gallery', compact('galleries', 'categories'));
    }
}
