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
            ['name' => 'withdrawal-charges', 'value' => '{"type": "0", "amount": "2"}'],
            ['name' => 'withdrawal-time', 'value' => '1'],
            ['name' => 'deposit-charges', 'value' => '{"type": "1", "amount": "12"}'],
            ['name' => 'admin-mail', 'value' => 'benjaminnicholas29@gmail.com'],
            ['name' => 'deposit-notification', 'value' => '1'],
            ['name' => 'investment-notification', 'value' => '1'],
            ['name' => 'withdrawal-notification', 'value' => '1'],
            ['name' => 'referral-bonus', 'value' => '10']
        ]);
    }
}
