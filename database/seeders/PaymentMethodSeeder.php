<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'title' => 'Online Ödeme',
                'code' => 'online',
                'description' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Banka Havalesi ile Ödeme',
                'code' => 'wire_transfer',
                'description' => 'wire_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
