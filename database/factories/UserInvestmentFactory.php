<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInvestment>
 */
class UserInvestmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = new DateTime();

        $date->modify('-1 day');

        return [
            'investment_id' => '1',
            'user_id' => '1',
            'amount' => '200',
            'last_payout' => $date->format('Y-m-d H:i:s'),
            'status' => '1',
        ];
    }
}
