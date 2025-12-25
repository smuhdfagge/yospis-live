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
        'image',
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
     * Get unique categories
     */
    public static function getCategories()
    {
        return self::distinct()->pluck('category')->filter()->values();
    }

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
}
