<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        return view('public.contact');
    }

    /**
     * Store a new contact submission.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'organization' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
