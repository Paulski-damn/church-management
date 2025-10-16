<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Board;

class BoardSeeder extends Seeder
{
    public function run()
    {
        $boards = [
            [
                'name' => 'Executive Board',
                'slug' => 'executive-board',
                'description' => 'The executive leadership team responsible for overall church management and strategic direction',
                'display_order' => 1,
            ],
            [
                'name' => 'Board of Elders',
                'slug' => 'board-of-elders',
                'description' => 'Spiritual leaders responsible for pastoral care, counseling, and spiritual guidance of the congregation',
                'display_order' => 2,
            ],
            [
                'name' => 'Board of Education',
                'slug' => 'board-of-education',
                'description' => 'Oversees educational programs, Sunday school, youth ministry, and faith formation initiatives',
                'display_order' => 3,
            ],
            [
                'name' => 'Board of Finance',
                'slug' => 'board-of-finance',
                'description' => 'Manages church finances, budgets, accounting, and financial planning for sustainable ministry',
                'display_order' => 4,
            ],
            [
                'name' => 'Board of Outreach',
                'slug' => 'board-of-outreach',
                'description' => 'Coordinates missionary work, community service, and evangelism programs in the local and global community',
                'display_order' => 5,
            ],
            [
                'name' => 'Board of Worship',
                'slug' => 'board-of-worship',
                'description' => 'Plans and organizes worship services, music programs, and liturgical celebrations',
                'display_order' => 6,
            ],
        ];

        foreach ($boards as $board) {
            Board::create($board);
        }
    }
}
