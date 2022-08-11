<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['name' => 'site-name', 'value' => 'investment'],
            ['name' => 'currency', 'value' => '1'],
            ['name' => 'minimum-withdrawal', 'value' => '300'],
            ['name' => 'maximum-withdrawal', 'value' => '200000'],
            ['name' => 'withdrawal-charges', 'value' => '{"type": "1", "amount": "0"}'],
            ['name' => 'withdrawal-time', 'value' => '1'],
        ]);
    }
}
