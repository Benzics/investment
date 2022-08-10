<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            ['id' => '1', 'name' => 'United States Dollar', 'short_code' => 'USD', 'symbol' => '$'],
            ['id' => '2', 'name' => 'Eureopean Euros', 'short_code' => 'EUR', 'symbol' => '€'],
        ]);
    }
}
