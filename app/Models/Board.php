<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function officers(): HasMany
    {
        return $this->hasMany(Officer::class)->orderBy('hierarchy_level')->orderBy('order');
    }

    public function activeOfficers(): HasMany
    {
        return $this->officers()->where('status', 'active');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function generateSlug($name)
    {
        return strtolower(str_replace(' ', '-', $name));
    }

    // Clean architecture: Centralized Tailwind color map
    public function getColorScheme(): array
    {
        $map = [
            'indigo' => [
                'bg' => 'bg-indigo-500',
                'text' => 'text-indigo-600',
                'border' => 'border-indigo-500',
                'gradient' => 'from-indigo-500 to-indigo-600',
            ],
            'blue' => [
                'bg' => 'bg-blue-500',
                'text' => 'text-blue-600',
                'border' => 'border-blue-500',
                'gradient' => 'from-blue-500 to-blue-600',
            ],
            'amber' => [
                'bg' => 'bg-amber-500',
                'text' => 'text-amber-600',
                'border' => 'border-amber-500',
                'gradient' => 'from-amber-500 to-amber-600',
            ],
            'cyan' => [
                'bg' => 'bg-cyan-500',
                'text' => 'text-cyan-600',
                'border' => 'border-cyan-500',
                'gradient' => 'from-cyan-500 to-cyan-600',
            ],
            'green' => [
                'bg' => 'bg-green-500',
                'text' => 'text-green-600',
                'border' => 'border-green-500',
                'gradient' => 'from-green-500 to-green-600',
            ],
            'red' => [
                'bg' => 'bg-red-500',
                'text' => 'text-red-600',
                'border' => 'border-red-500',
                'gradient' => 'from-red-500 to-red-600',
            ],
            'purple' => [
                'bg' => 'bg-purple-500',
                'text' => 'text-purple-600',
                'border' => 'border-purple-500',
                'gradient' => 'from-purple-500 to-purple-600',
            ],
        ];

        return $map[$this->color] ?? $map['indigo'];
    }
}
