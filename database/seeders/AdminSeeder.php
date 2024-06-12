<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)
            ->state(['email' => 'admin@example.com'])
            ->state(['tc' => '00000000000'])
            ->state(['type' => User::Admin])
            ->create();
    }
}
