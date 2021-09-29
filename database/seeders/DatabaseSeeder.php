<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        //Company::factory(30)->create();
        $this->call(MonthSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(QuestionTypeSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
