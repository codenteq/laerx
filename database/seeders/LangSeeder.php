<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'title' => 'Türkçe',
                'code' => 'tr',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'English',
                'code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'فارسی',
                'code' => 'fa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'عربي',
                'code' => 'ar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
