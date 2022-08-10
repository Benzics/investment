<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->insert([
            'user_id' => 1,
            'credit' => 1000,
            'description' => 'Initial admin deposit',
            'balance' => 1000,
            'type' => '1',
            'created_at' => now(),
        ]);
    }
}
