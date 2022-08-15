<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investments')->insert([
            [
                'name' => 'MINDFUL',
                'commission' => '9.5',
                'commission_type' => '0',
                'minimum' => '100',
                'maximum' => '5000',
                'type' => '1',
                'times' => '90',
            ],
            [
                'name' => 'CONSERVATIVE',
                'commission' => '10.5',
                'commission_type' => '0',
                'minimum' => '500',
                'maximum' => '10000',
                'type' => '1',
                'times' => '120',
            ],
            [
                'name' => 'BALANCED',
                'commission' => '12.5',
                'commission_type' => '0',
                'minimum' => '1000',
                'maximum' => '100000',
                'type' => '7',
                'times' => '365',
            ],

        ]);
    }
}
