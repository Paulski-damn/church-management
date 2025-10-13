<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $members = [
            [
                'first_name' => 'Juan',
                'middle_name' => 'Santos',
                'last_name' => 'Dela Cruz',
                'birthdate' => Carbon::now()->subYears(8)->format('Y-m-d'),
                'gender' => 'Male',
                'address' => '123 Main St, Manila',
                'contact_number' => '09171234567',
                'father_name' => 'Pedro Dela Cruz',
                'mother_name' => 'Maria Dela Cruz',
            ],
            [
                'first_name' => 'Maria',
                'middle_name' => 'Garcia',
                'last_name' => 'Santos',
                'birthdate' => Carbon::now()->subYears(25)->format('Y-m-d'),
                'gender' => 'Female',
                'address' => '456 Church Ave, Quezon City',
                'contact_number' => '09181234567',
                'father_name' => 'Jose Garcia',
                'mother_name' => 'Ana Garcia',
            ],
            [
                'first_name' => 'Pedro',
                'middle_name' => 'Reyes',
                'last_name' => 'Ramos',
                'birthdate' => Carbon::now()->subYears(40)->format('Y-m-d'),
                'gender' => 'Male',
                'address' => '789 Faith Rd, Makati',
                'contact_number' => '09191234567',
                'father_name' => 'Antonio Ramos',
                'mother_name' => 'Elena Ramos',
            ],
            [
                'first_name' => 'Rosa',
                'middle_name' => 'Cruz',
                'last_name' => 'Bautista',
                'birthdate' => Carbon::now()->subYears(60)->format('Y-m-d'),
                'gender' => 'Female',
                'address' => '321 Grace St, Pasig',
                'contact_number' => '09201234567',
                'father_name' => 'Miguel Cruz',
                'mother_name' => 'Carmen Cruz',
            ],
            [
                'first_name' => 'Roberto',
                'middle_name' => 'Flores',
                'last_name' => 'Mendoza',
                'birthdate' => Carbon::now()->subYears(55)->format('Y-m-d'),
                'gender' => 'Male',
                'address' => '654 Hope Blvd, Taguig',
                'contact_number' => '09211234567',
                'father_name' => 'Carlos Mendoza',
                'mother_name' => 'Luz Mendoza',
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
