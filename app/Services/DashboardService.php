<?php

namespace App\Services;

use App\Models\Member;
use App\Models\Board;
use Carbon\Carbon;

class DashboardService
{
    public function getDashboardData()
    {
        // Top 4 Cards
        $activeMembersCount = Member::active()->count();
        $maleCount = Member::active()->where('gender', 'Male')->count();
        $femaleCount = Member::active()->where('gender', 'Female')->count();
        $newMembersYTD = Member::whereYear('created_at', date('Y'))->count();

        // Age Distribution
        $ageDistribution = $this->getAgeDistribution();

        // Membership Growth
        $growthData = $this->getGrowthData();
        $growthPercentage = $this->calculateGrowthPercentage($growthData);

        // Officers by Board
        $boardData = $this->getOfficersByBoard();

        // Birthdays
        $upcomingBirthdays = $this->getUpcomingBirthdays();
        $birthdaysThisMonth = $this->getBirthdaysThisMonth();

        return [
            'activeMembersCount' => $activeMembersCount,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'newMembersYTD' => $newMembersYTD,
            'children' => $ageDistribution['Children'],
            'cyf' => $ageDistribution['CYF'],
            'cyaf' => $ageDistribution['CYAF'],
            'ucm' => $ageDistribution['UCM'],
            'cwa' => $ageDistribution['CWA'],
            'growthData' => $growthData['data'],
            'growthLabels' => $growthData['labels'],
            'growthPercentage' => $growthPercentage,
            'boardLabels' => $boardData['labels'],
            'officersByBoard' => $boardData['counts'],
            'upcomingBirthdays' => $upcomingBirthdays,
            'birthdaysThisMonth' => $birthdaysThisMonth,
        ];
    }

    private function getAgeDistribution()
    {
        $categories = ['Children' => 0, 'CYF' => 0, 'CYAF' => 0, 'UCM' => 0, 'CWA' => 0];
        $members = Member::active()->select('birthdate','gender')->get();

        foreach ($members as $member) {
            $age = Carbon::parse($member->birthdate)->age;
            $gender = $member->gender;

            if ($age <= 12) {
                $categories['Children']++;
            } elseif ($age <= 30) {
                $categories['CYF']++;
            } elseif ($age <= 50) {
                $categories['CYAF']++;
            } elseif ($age >= 50 && $gender === 'Male') {
                $categories['UCM']++;
            } else {
                $categories['CWA']++;
            }
        }

        return $categories;
    }


    private function getGrowthData()
    {
        $data = [];
        $labels = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');
            $data[] = Member::where('created_at', '<=', $date->endOfMonth())->count();
        }

        return compact('data', 'labels');
    }

    private function calculateGrowthPercentage(array $growthData)
    {
        $current = end($growthData['data']);
        $previous = $growthData['data'][count($growthData['data']) - 2] ?? $current;
        return $previous > 0 ? round((($current - $previous) / $previous) * 100, 1) : 0;
    }

    private function getOfficersByBoard()
    {
        $boards = Board::active()->orderBy('display_order')->get();
        $labels = [];
        $counts = [];

        foreach ($boards as $board) {
            $labels[] = $board->name;
            $counts[] = $board->activeOfficers()->count();
        }

        return compact('labels', 'counts');
    }

    private function getUpcomingBirthdays()
    {
        return Member::active()
            ->get()
            ->filter(function ($member) {
                $birthday = Carbon::parse($member->birthdate);
                $today = Carbon::today();
                $thisYearBirthday = Carbon::create($today->year, $birthday->month, $birthday->day);

                if ($thisYearBirthday->lt($today)) {
                    $thisYearBirthday->addYear();
                }

                return $thisYearBirthday->diffInDays($today) <= 30;
            })
            ->map(function ($member) {
                $birthday = Carbon::parse($member->birthdate);
                $today = Carbon::today();
                $thisYearBirthday = Carbon::create($today->year, $birthday->month, $birthday->day);

                if ($thisYearBirthday->lt($today)) {
                    $thisYearBirthday->addYear();
                }

                $member->days_until = $thisYearBirthday->diffInDays($today);
                return $member;
            })
            ->sortBy('days_until')
            ->take(5);
    }

    private function getBirthdaysThisMonth()
    {
        return Member::active()
            ->whereMonth('birthdate', Carbon::now()->month)
            ->count();
    }
}
