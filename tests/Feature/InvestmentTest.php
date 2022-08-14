<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\UserInvestmentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvestmentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_user_investment_page()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/user/new-investment');

        $response->assertOk()->assertValid();
    }

    public function test_user_investment_preview()
    {
        $user = User::find(1);

        $data = [
            'investment_id' => '1',
        ];
        $response = $this->actingAs($user)->post('/user/new-investment', $data);
        $response->assertValid()->assertOk();
    }

    public function test_user_investment_create()
    {
        $user = User::find(1);

        $data = [
            'amount' => '100',
            'investment_id' => '1',
        ];

        $response = $this->actingAs($user)->post('/user/invest', $data);
        $response->assertValid()->assertSessionHas('success')->assertRedirect('/user/investments');
    }

    public function test_user_investments_list()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/user/investments');

        $response->assertOk()->assertValid();
    }

    public function test_investment_payout()
    {
        $user_investment_service = new UserInvestmentService();

        $pay_user = $user_investment_service->pay_user_investment(1);

        $this->assertTrue($pay_user);
    }
}
