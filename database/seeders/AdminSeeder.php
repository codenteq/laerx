<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Ali',
                'surname' => 'Karabay',
                'tc' => '21071778216',
                'email' => 'alikarabay77@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'type' => User::Admin,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ahmet',
                'surname' => 'Arşiv',
                'tc' => '26339606072',
                'email' => 'aarsiv80@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'type' => User::Admin,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
