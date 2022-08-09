<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepositTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_wallet_page()
    {
        $response = $this->get('/admin/fund-wallet');
        $response->assertOk();
    }

    public function test_wallet_funding()
    {
        $data = [
            'email' => 'admin@site.com',
            'credit' => '20',
        ];

        $response = $this->post('/admin/fund-wallet', $data);
        $response->assertValid()
        ->assertRedirect('/admin/fund-wallet');

    }

    public function test_user_deposit_page()
    {
        $response = $this->get('/user/deposit');
        $response->assertOk;
    }
}
