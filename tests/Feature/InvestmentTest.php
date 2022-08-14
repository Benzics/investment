<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserInvestment;
use App\Services\UserInvestmentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvestmentTest extends TestCase
{
    use RefreshDatabase;

    public $user;
    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }

    public function test_user_investment_page()
    {

        $response = $this->actingAs($this->user)->get('/user/new-investment');

        $response->assertOk()->assertValid();
    }

    public function test_user_investment_preview()
    {

        $data = [
            'investment_id' => '1',
        ];
        $response = $this->actingAs($this->user)->post('/user/new-investment', $data);
        $response->assertValid()->assertOk();
    }

    public function test_user_investment_create()
    {

        $data = [
            'amount' => '100',
            'investment_id' => '1',
        ];

        $response = $this->actingAs($this->user)->post('/user/invest', $data);
        $response->assertValid()->assertSessionHas('success')->assertRedirect('/user/investments');
    }

    public function test_user_investments_list()
    {

        $response = $this->actingAs($this->user)->get('/user/investments');

        $response->assertOk()->assertValid();
    }

    public function test_investment_payout()
    {
        UserInvestment::factory()->create();

        $user_investment_service = new UserInvestmentService();

        $pay_user = $user_investment_service->pay_user_investment(1);

        $this->assertDatabaseHas('wallets', ['user_id' => '1', 'type' => '5']);
    }
}
