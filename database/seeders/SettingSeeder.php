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
            ['name' => 'withdrawal-charges', 'value' => '{"type": "0", "amount": "0"}'],
            ['name' => 'withdrawal-time', 'value' => '1'],
            ['name' => 'deposit-charges', 'value' => '{"type": "0", "amount": "0"}'],
            ['name' => 'admin-mail', 'value' => 'admin@gmail.com'],
            ['name' => 'support-mail', 'value' => 'support@site.com'],
            ['name' => 'deposit-notification', 'value' => '1'],
            ['name' => 'investment-notification', 'value' => '1'],
            ['name' => 'withdrawal-notification', 'value' => '1'],
            ['name' => 'referral-bonus', 'value' => '10'],
            ['name' => 'site-logo-1', 'value' => '/assets/images/pro.jpg'],
            ['name' => 'site-logo-2', 'value' => '/assets/images/v2/logo-light.png'],
            ['name' => 'site-logo-3', 'value' => '/assets/images/v2/logo1.png'],
            ['name' => 'address', 'value' => 'Kloveniersburgwal 105II, 1011 KB Amsterdam, Netherlands'],
            ['name' => 'phone', 'value' => '+1 959 500 9190'],
        ]);
    }
}
