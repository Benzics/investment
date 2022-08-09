<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            [
                'id' => '1',
                'name' => 'Bitcoin',
                'image' => '/assets/images/5b55bb652af1a.png',
                'address' => 'xxx',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Ethereum',
                'image' => '/assets/images/1532345051h7.png',
                'address' => 'xxx',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Skrill',
                'image' => '/assets/images/1532345115h7.png',
                'address' => 'xxx',
                'status' => '1',
            ]
            ]);
    }
}
