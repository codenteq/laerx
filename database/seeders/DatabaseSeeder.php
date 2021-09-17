<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
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
    }
}
