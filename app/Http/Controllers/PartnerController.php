<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\View\View;

class PartnerController extends Controller
{
    /**
     * Display a listing of partners.
     */
    public function index(): View
    {
        $donors = Partner::active()->donors()->ordered()->get();
        $implementingPartners = Partner::active()->implementing()->ordered()->get();
        $governmentPartners = Partner::active()->government()->ordered()->get();
        $mediaPartners = Partner::active()->where('type', 'media')->ordered()->get();
        $corporatePartners = Partner::active()->where('type', 'corporate')->ordered()->get();

        return view('public.partners', compact(
            'donors',
            'implementingPartners',
            'governmentPartners',
            'mediaPartners',
            'corporatePartners'
        ));
    }
}
