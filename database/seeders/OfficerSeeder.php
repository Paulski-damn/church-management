<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Officer;
use App\Models\Board;
use Carbon\Carbon;

class OfficerSeeder extends Seeder
{
    public function run()
    {
        // Executive Board Officers
        $executiveBoard = Board::where('slug', 'executive-board')->first();
        if ($executiveBoard) {
            Officer::create([
                'first_name' => 'John',
                'middle_name' => 'Michael',
                'last_name' => 'Smith',
                'position' => 'President/Chairperson',
                'board_id' => $executiveBoard->id,
                'hierarchy_level' => 0,
                'email' => 'john@church.com',
                'contact_number' => '09171234567',
                'bio' => 'Senior pastor and church president with 20 years of ministry experience.',
                'order' => 1,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Maria',
                'middle_name' => 'Grace',
                'last_name' => 'Santos',
                'position' => 'Vice President/Vice Chair',
                'board_id' => $executiveBoard->id,
                'hierarchy_level' => 1,
                'email' => 'maria@church.com',
                'contact_number' => '09181234567',
                'bio' => 'Ministry coordinator and administrative leader.',
                'order' => 2,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Robert',
                'middle_name' => 'James',
                'last_name' => 'Reyes',
                'position' => 'Treasurer',
                'board_id' => $executiveBoard->id,
                'hierarchy_level' => 2,
                'email' => 'robert@church.com',
                'contact_number' => '09191234567',
                'bio' => 'Financial manager and budget controller.',
                'order' => 3,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Angela',
                'middle_name' => 'Rose',
                'last_name' => 'Lopez',
                'position' => 'Secretary',
                'board_id' => $executiveBoard->id,
                'hierarchy_level' => 2,
                'email' => 'angela@church.com',
                'contact_number' => '09201234567',
                'bio' => 'Records keeper and meeting coordinator.',
                'order' => 4,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Daniel',
                'middle_name' => 'Paul',
                'last_name' => 'Cruz',
                'position' => 'Auditor',
                'board_id' => $executiveBoard->id,
                'hierarchy_level' => 2,
                'email' => 'daniel@church.com',
                'contact_number' => '09211234567',
                'bio' => 'Financial auditor and compliance officer.',
                'order' => 5,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);
        }

        // Board of Elders Officers
        $eldersBoard = Board::where('slug', 'board-of-elders')->first();
        if ($eldersBoard) {
            Officer::create([
                'first_name' => 'Joseph',
                'middle_name' => 'Emmanuel',
                'last_name' => 'Mendoza',
                'position' => 'President/Chairperson',
                'board_id' => $eldersBoard->id,
                'hierarchy_level' => 0,
                'email' => 'joseph@church.com',
                'contact_number' => '09221234567',
                'bio' => 'Lead elder with 25 years of spiritual leadership experience.',
                'order' => 1,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(2),
                'term_end' => Carbon::now()->addYears(1),
            ]);

            Officer::create([
                'first_name' => 'Patricia',
                'middle_name' => 'Anne',
                'last_name' => 'Gonzales',
                'position' => 'Vice President/Vice Chair',
                'board_id' => $eldersBoard->id,
                'hierarchy_level' => 1,
                'email' => 'patricia@church.com',
                'contact_number' => '09231234567',
                'bio' => 'Spiritual mentor and counselor.',
                'order' => 2,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(2),
                'term_end' => Carbon::now()->addYears(1),
            ]);

            Officer::create([
                'first_name' => 'Thomas',
                'middle_name' => 'David',
                'last_name' => 'Bautista',
                'position' => 'Member',
                'board_id' => $eldersBoard->id,
                'hierarchy_level' => 3,
                'email' => 'thomas@church.com',
                'contact_number' => '09241234567',
                'bio' => 'Elder member focused on pastoral care.',
                'order' => 3,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Susan',
                'middle_name' => 'Elizabeth',
                'last_name' => 'Mercado',
                'position' => 'Member',
                'board_id' => $eldersBoard->id,
                'hierarchy_level' => 3,
                'email' => 'susan@church.com',
                'contact_number' => '09251234567',
                'bio' => 'Elder member providing spiritual guidance.',
                'order' => 4,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);
        }

        // Board of Education Officers
        $educationBoard = Board::where('slug', 'board-of-education')->first();
        if ($educationBoard) {
            Officer::create([
                'first_name' => 'Michael',
                'middle_name' => 'Christopher',
                'last_name' => 'Torres',
                'position' => 'President/Chairperson',
                'board_id' => $educationBoard->id,
                'hierarchy_level' => 0,
                'email' => 'michael@church.com',
                'contact_number' => '09261234567',
                'bio' => 'Dr. Torres, education director with expertise in curriculum development.',
                'order' => 1,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Elizabeth',
                'middle_name' => 'Marie',
                'last_name' => 'Ramos',
                'position' => 'Vice President/Vice Chair',
                'board_id' => $educationBoard->id,
                'hierarchy_level' => 1,
                'email' => 'elizabeth@church.com',
                'contact_number' => '09271234567',
                'bio' => 'Curriculum coordinator for Sunday school programs.',
                'order' => 2,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'James',
                'middle_name' => 'Patrick',
                'last_name' => 'Simons',
                'position' => 'Director',
                'board_id' => $educationBoard->id,
                'hierarchy_level' => 3,
                'email' => 'james@church.com',
                'contact_number' => '09281234567',
                'bio' => 'Youth ministry director leading youth fellowship programs.',
                'order' => 3,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);
        }

        // Board of Finance Officers
        $financeBoard = Board::where('slug', 'board-of-finance')->first();
        if ($financeBoard) {
            Officer::create([
                'first_name' => 'Richard',
                'middle_name' => 'Lawrence',
                'last_name' => 'Davis',
                'position' => 'President/Chairperson',
                'board_id' => $financeBoard->id,
                'hierarchy_level' => 0,
                'email' => 'richard@church.com',
                'contact_number' => '09291234567',
                'bio' => 'CFO with extensive financial management experience.',
                'order' => 1,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(2),
                'term_end' => Carbon::now()->addYears(1),
            ]);

            Officer::create([
                'first_name' => 'Margaret',
                'middle_name' => 'Helen',
                'last_name' => 'White',
                'position' => 'Vice President/Vice Chair',
                'board_id' => $financeBoard->id,
                'hierarchy_level' => 1,
                'email' => 'margaret@church.com',
                'contact_number' => '09301234567',
                'bio' => 'Financial secretary handling accounting records.',
                'order' => 2,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(2),
                'term_end' => Carbon::now()->addYears(1),
            ]);

            Officer::create([
                'first_name' => 'Kevin',
                'middle_name' => 'Scott',
                'last_name' => 'Brown',
                'position' => 'Member',
                'board_id' => $financeBoard->id,
                'hierarchy_level' => 3,
                'email' => 'kevin@church.com',
                'contact_number' => '09311234567',
                'bio' => 'Stewardship chair overseeing giving programs.',
                'order' => 3,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);
        }

        // Board of Outreach Officers
        $outreachBoard = Board::where('slug', 'board-of-outreach')->first();
        if ($outreachBoard) {
            Officer::create([
                'first_name' => 'David',
                'middle_name' => 'Anthony',
                'last_name' => 'Miller',
                'position' => 'President/Chairperson',
                'board_id' => $outreachBoard->id,
                'hierarchy_level' => 0,
                'email' => 'david@church.com',
                'contact_number' => '09321234567',
                'bio' => 'Pastor with passion for community outreach and missions.',
                'order' => 1,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Lisa',
                'middle_name' => 'Catherine',
                'last_name' => 'Johnson',
                'position' => 'Vice President/Vice Chair',
                'board_id' => $outreachBoard->id,
                'hierarchy_level' => 1,
                'email' => 'lisa@church.com',
                'contact_number' => '09331234567',
                'bio' => 'Community programs leader coordinating service projects.',
                'order' => 2,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);

            Officer::create([
                'first_name' => 'Carlos',
                'middle_name' => 'Miguel',
                'last_name' => 'Martinez',
                'position' => 'Member',
                'board_id' => $outreachBoard->id,
                'hierarchy_level' => 3,
                'email' => 'carlos@church.com',
                'contact_number' => '09341234567',
                'bio' => 'Mission trips coordinator organizing global ministry efforts.',
                'order' => 3,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);
        }

        // Board of Worship Officers
        $worshipBoard = Board::where('slug', 'board-of-worship')->first();
        if ($worshipBoard) {
            Officer::create([
                'first_name' => 'Sandra',
                'middle_name' => 'Joyce',
                'last_name' => 'Wilson',
                'position' => 'President/Chairperson',
                'board_id' => $worshipBoard->id,
                'hierarchy_level' => 0,
                'email' => 'sandra@church.com',
                'contact_number' => '09351234567',
                'bio' => 'Organist and worship coordinator with 30 years of experience.',
                'order' => 1,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(2),
                'term_end' => Carbon::now()->addYears(1),
            ]);

            Officer::create([
                'first_name' => 'James',
                'middle_name' => 'William',
                'last_name' => 'Harris',
                'position' => 'Vice President/Vice Chair',
                'board_id' => $worshipBoard->id,
                'hierarchy_level' => 1,
                'email' => 'harris@church.com',
                'contact_number' => '09361234567',
                'bio' => 'Choir director leading the church choir and music ministry.',
                'order' => 2,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(2),
                'term_end' => Carbon::now()->addYears(1),
            ]);

            Officer::create([
                'first_name' => 'Paul',
                'middle_name' => 'Kenneth',
                'last_name' => 'Lee',
                'position' => 'Member',
                'board_id' => $worshipBoard->id,
                'hierarchy_level' => 3,
                'email' => 'paul@church.com',
                'contact_number' => '09371234567',
                'bio' => 'Deacon planning liturgy and worship services.',
                'order' => 3,
                'status' => 'active',
                'term_start' => Carbon::now()->subYears(1),
                'term_end' => Carbon::now()->addYears(2),
            ]);
        }
    }
}
