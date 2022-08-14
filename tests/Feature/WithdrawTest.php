<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WithdrawTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
       
    }

    public function test_user_withdraw_page()
    {
        $response = $this->actingAs($this->user)->get('/user/withdrawal');
        $response->assertOk()->assertValid();
    }

    public function test_user_withdraw_function()
    {
        $data = [
            'amount' => '300',
            'payment_id' => '1',
            'address' => 'xxxx',
        ];
        $response = $this->actingAs($this->user)->post('/user/withdrawal', $data);
        $response->assertValid()
            ->assertRedirect('/user/withdrawal')
            ->assertSessionHas('success');
    }

    public function test_withdrawal_list()
    {
        $response = $this->actingAs($this->user)->get('/user/withdrawals');
        $response->assertValid()->assertOk();
    }
}
