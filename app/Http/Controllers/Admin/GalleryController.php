<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the galleries.
     */
    public function index(Request $request)
    {
        $query = Gallery::withCount('images');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

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
     * Show the form for creating a new gallery.
     */
    public function create()
    {
        $categories = Gallery::getCategories();
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created gallery in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string|max:100',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $gallery = Gallery::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'],
            'is_published' => $request->has('is_published'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        foreach ($request->file('images') as $i => $image) {
            $gallery->images()->create([
                'image' => $image->store('galleries', 'public'),
                'sort_order' => $i,
            ]);
        }

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery created successfully.');
    }

    /**
     * Show the form for editing the specified gallery.
     */
    public function edit(Gallery $gallery)
    {
        $gallery->load('images');
        $categories = Gallery::getCategories();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified gallery in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string|max:100',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
            'remove_images' => 'nullable|array',
            'remove_images.*' => 'integer|exists:gallery_images,id',
        ]);

        $gallery->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'],
            'is_published' => $request->has('is_published'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        // Remove selected images
        if ($request->filled('remove_images')) {
            $toRemove = GalleryImage::whereIn('id', $request->remove_images)
                ->where('gallery_id', $gallery->id)
                ->get();

            foreach ($toRemove as $img) {
                if ($img->image && !str_starts_with($img->image, 'http')) {
                    Storage::disk('public')->delete($img->image);
                }
                $img->delete();
            }
        }

        // Add new images
        if ($request->hasFile('images')) {
            $maxSort = $gallery->images()->max('sort_order') ?? -1;
            foreach ($request->file('images') as $i => $image) {
                $gallery->images()->create([
                    'image' => $image->store('galleries', 'public'),
                    'sort_order' => $maxSort + 1 + $i,
                ]);
            }
        }

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified gallery from storage.
     */
    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->images as $img) {
            if ($img->image && !str_starts_with($img->image, 'http')) {
                Storage::disk('public')->delete($img->image);
            }
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery deleted successfully.');
    }

    /**
     * Toggle the published status of the gallery.
     */
    public function togglePublish(Gallery $gallery)
    {
        $gallery->update(['is_published' => !$gallery->is_published]);

        return back()->with('success', 'Gallery status updated.');
    }
}
