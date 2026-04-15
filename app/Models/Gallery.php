<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Scope for published gallery items
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope for filtering by category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope for ordering by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    /**
     * Get the images for this gallery
     */
    public function images()
    {
        return $this->hasMany(GalleryImage::class)->orderBy('sort_order');
    }

    /**
     * Get the cover image URL (first image)
     */
    public function getCoverImageUrlAttribute()
    {
        $first = $this->images->first();
        return $first ? $first->image_url : asset('images/placeholder.png');
    }

    /**
     * Get unique categories
     */
    public static function getCategories()
    {
        return self::distinct()->pluck('category')->filter()->values();
    }

}
