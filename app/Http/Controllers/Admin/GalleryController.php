<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery items.
     */
    public function index(Request $request)
    {
        $query = Gallery::query();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by published status
        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $galleries = $query->ordered()->paginate(12);
        $categories = Gallery::getCategories();

        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    /**
     * Show the form for creating a new gallery item.
     */
    public function create()
    {
        $categories = Gallery::getCategories();
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created gallery item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string|max:100',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery image added successfully.');
    }

    /**
     * Display the specified gallery item.
     */
    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified gallery item.
     */
    public function edit(Gallery $gallery)
    {
        $categories = Gallery::getCategories();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified gallery item in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string|max:100',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image && !str_starts_with($gallery->image, 'http')) {
                Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    /**
     * Remove the specified gallery item from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete image file
        if ($gallery->image && !str_starts_with($gallery->image, 'http')) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery image deleted successfully.');
    }

    /**
     * Toggle the published status of the gallery item.
     */
    public function togglePublish(Gallery $gallery)
    {
        $gallery->update(['is_published' => !$gallery->is_published]);

        return back()->with('success', 'Gallery image status updated.');
    }
}
