<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepositTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_admin_wallet_page()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/admin/fund-wallet');
        $response->assertOk();
    }

    public function test_wallet_funding()
    {
        $data = [
            'email' => 'admin@site.com',
            'credit' => '20',
        ];

        $user = User::find(1);

        $response = $this->actingAs($user)->post('/admin/fund-wallet', $data);
        $response->assertValid()
        ->assertRedirect('/admin/fund-wallet');

    }

    public function test_user_deposit_page()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/user/deposit');
        $response->assertOk;
    }
}