<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Officer extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'position',
        'board_id',
        'bio',
        'email',
        'contact_number',
        'photo_path',
        'order',
        'hierarchy_level',
        'status',
        'term_start',
        'term_end'
    ];

    protected $casts = [
        'term_start' => 'date',
        'term_end' => 'date',
    ];

    // Relationship with board
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    // Get full name
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    // Get initials for avatar
    public function getInitialsAttribute()
    {
        return strtoupper(substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1));
    }

    // Check if active
    public function isActive()
    {
        return $this->status === 'active';
    }

    // Photo URL
    public function getPhotoUrlAttribute()
    {
        if ($this->photo_path) {
            return asset('storage/' . $this->photo_path);
        }
        return null;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByBoard($query, $boardId)
    {
        return $query->where('board_id', $boardId);
    }

    public function scopeOrderedByHierarchy($query)
    {
        return $query->orderBy('hierarchy_level')->orderBy('order');
    }
}
