<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MonthSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(QuestionTypeSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(LangSeeder::class);
    }
}
