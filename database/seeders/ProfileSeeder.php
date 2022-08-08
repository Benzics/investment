<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => '1',
            'role_id' => '2',
            'referrer' => '0',
            'ref_id' => 'ZFX-100001',
            'gender' => 'male',
            'phone' => '123456789',
            'address' => '',
            'zip' => '',
            'country' => '',
        ]);
    }
}
