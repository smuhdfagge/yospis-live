<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'website',
        'description',
        'type',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active partners.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for donors.
     */
    public function scopeDonors($query)
    {
        return $query->where('type', 'donor');
    }

    /**
     * Scope for implementing partners.
     */
    public function scopeImplementing($query)
    {
        return $query->where('type', 'implementing');
    }

    /**
     * Scope for government partners.
     */
    public function scopeGovernment($query)
    {
        return $query->where('type', 'government');
    }

    /**
     * Scope ordered by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
