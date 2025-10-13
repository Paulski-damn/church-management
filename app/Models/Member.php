<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Member extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'birthdate',
        'gender', 'address', 'contact_number', 'father_name',
        'mother_name', 'is_active'
    ];

    protected $casts = [
        'birthdate' => 'date',
        'is_active' => 'boolean'
    ];

    // Calculate age from birthdate
    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }

    // Get age category
    public function getAgeCategoryAttribute()
    {
        $age = $this->age;

        if ($age >= 0 && $age <= 11) {
            return 'Children';
        } elseif ($age >= 12 && $age <= 30) {
            return 'CYF';
        } elseif ($age >= 31 && $age <= 50) {
            return 'CYAF';
        } elseif ($age >= 51) {
            return $this->gender === 'Male' ? 'UCM' : 'CWA';
        }
    }

    // Scope for active members
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
