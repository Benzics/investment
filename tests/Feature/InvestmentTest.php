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

    public function test_admin_investment_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/investments');

        $response->assertOk();
    }

    public function test_admin_investment_add()
    {
        $data = [
            'name' => 'Test investment',
            'commission' => '1',
            'commission_type' => '0',
            'minimum' => '12',
            'maximum' => '1200',
            'type' => '1',
            'times' => '5',
        ];

        $response = $this->actingAs($this->user)->post('/admin/investments', $data);

        $response->assertValid()->assertSessionHas('success')->assertRedirect('/admin/investments');

    }

    public function test_admin_investment_view()
    {
        $response = $this->actingAs($this->user)->get('/admin/investments/1');

        $response->assertOk();
    }

    public function test_admin_investment_update_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/investments/1/edit');

        $response->assertOk();
    }

    public function test_admin_investment_update()
    {
        $data = [
            'name' => 'Test investment',
            'commission' => '1',
            'commission_type' => '0',
            'minimum' => '12',
            'maximum' => '1200',
            'type' => '1',
            'times' => '5',
        ];

        $response = $this->actingAs($this->user)->put('/admin/investments/1', $data);

        $response->assertValid()->assertRedirect('/admin/investments/1')->assertSessionHas('success');
    }

    public function test_admin_investment_delete()
    {
        $response = $this->actingAs($this->user)->delete('/admin/investments/1');

        $response->assertRedirect('/admin/investments')->assertSessionHas('success');
    }

    public function test_admin_user_investments()
    {
        $response = $this->actingAs($this->user)->get('/admin/user-investments');

        $response->assertOk();
    }
}
