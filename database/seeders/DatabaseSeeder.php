<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user for UCCP Magallanes
        User::factory()->create([
            'name' => 'UCCP Magallanes',
            'email' => 'uccpmagallanes@gmail.com',
            'password' => bcrypt('Uccpmagallanes'),
        ]);

        // Optionally create additional test users
        // User::factory(10)->create();
    }
}
