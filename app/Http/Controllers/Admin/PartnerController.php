<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PartnerController extends Controller
{
    /**
     * Display a listing of partners.
     */
    public function index(Request $request): View
    {
        $query = Partner::ordered();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $partners = $query->paginate(15);

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new partner.
     */
    public function create(): View
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created partner.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:1024',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|in:donor,implementing,government,media,corporate',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')
                ->store('partners', 'public');
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner created successfully.');
    }

    /**
     * Show the form for editing the specified partner.
     */
    public function edit(Partner $partner): View
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified partner.
     */
    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:1024',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|in:donor,implementing,government,media,corporate',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $validated['logo'] = $request->file('logo')
                ->store('partners', 'public');
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    /**
     * Remove the specified partner.
     */
    public function destroy(Partner $partner): RedirectResponse
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner deleted successfully.');
    }

    /**
     * Toggle partner active status.
     */
    public function toggleActive(Partner $partner): RedirectResponse
    {
        $partner->update(['is_active' => !$partner->is_active]);

        $status = $partner->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Partner {$status}.");
    }
}
