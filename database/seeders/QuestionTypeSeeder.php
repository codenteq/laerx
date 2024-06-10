<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
            [
                'title' => 'İlk Yardım',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trafik Çevre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Araç Tekniği',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trafik Adabı',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
