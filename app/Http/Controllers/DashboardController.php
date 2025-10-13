<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get active members count
        $activeMembersCount = Member::active()->count();

        // Initialize counters
        $children = 0;
        $cyf = 0;
        $cyaf = 0;
        $ucm = 0;
        $cwa = 0;

        // Get all active members and categorize
        $members = Member::active()->get();

        foreach ($members as $member) {
            switch ($member->age_category) {
                case 'Children':
                    $children++;
                    break;
                case 'CYF':
                    $cyf++;
                    break;
                case 'CYAF':
                    $cyaf++;
                    break;
                case 'UCM':
                    $ucm++;
                    break;
                case 'CWA':
                    $cwa++;
                    break;
            }
        }

        // 🔹 Get the 5 most recently added members
        $recentActivities = Member::orderBy('created_at', 'desc')
            ->take(5)
            ->get(['first_name', 'middle_name', 'last_name', 'created_at']);

        return view('dashboard', compact(
            'activeMembersCount',
            'children',
            'cyf',
            'cyaf',
            'ucm',
            'cwa',
            'recentActivities'
        ));
    }
}